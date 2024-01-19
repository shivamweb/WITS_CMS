<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\PaymentStatusEnum;
use App\Models\BookDetail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderTransection;
use App\Models\SchoolDetail;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    use SessionTrait;

    private $schoolDetails, $cart, $order, $orderItem, $bookDetail, $orderTransection;

    public function __construct(
        SchoolDetail $schoolDetails,
        Cart $cart,
        Order $order,
        OrderItem $orderItem,
        BookDetail $bookDetail,
        OrderTransection $orderTransection
    ) {
        $this->schoolDetails = $schoolDetails;
        $this->cart = $cart;
        $this->order = $order;
        $this->orderItem = $orderItem;
        $this->bookDetail = $bookDetail;
        $this->orderTransection = $orderTransection;
    }

    public function checkout(Request $request)
    {
        try {
            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $school = $this->schoolDetails->where('uuid', $uuid)->first();
            $cartItems = $this->cart->where('school_id', $school->id)->get();

            $order = $this->order->create([
                'school_id'        => $school->id,
                'payment_status'   => PaymentStatusEnum::PENDING,
                'payment_method'   => PaymentMethodEnum::CASH_ON_DELIVERED,
                'order_status'     => OrderStatusEnum::PENDING,
                'total_Amount'     => $cartItems->sum('total_price'),
                'remaining_Amount' => $cartItems->sum('total_price'),
            ]);

            foreach ($cartItems as $cartItem) {
                $this->orderItem->create([
                    'order_id' => $order->id,
                    'book_id'  => $cartItem->book_id,
                    'quantity' => $cartItem->quantity,
                    'price'    => $cartItem->price,
                    'subtotal' => $cartItem->total_price,
                ]);
            }

            $this->cart->where('school_id', $school->id)->delete();

            return response()->json(['message' => 'Checkout successful']);
        } catch (\Throwable $e) {
            Log::error('[OrderController][checkout] Error order placing ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred during placing order.');
        }
    }

    public function orderListToAdmin(Request $request)
    {
        $status = null;
        $message = null;
        $orders = $this->order->with('school')->get();
        $orders->load('school');
        return view('admin.order', compact('orders'))->render();
    }

    public function viewInvoiceToSchool(int $orderId)
    {
        $status = null;
        $message = null;
        $order = $this->order->where('id', $orderId, 'school')->first();
        if (!$order) {
            return redirect()->back()->with('status', 'error')->with('message', 'Order not found.');
        }
        $school = $order->school;
        $orderItems = $order->orderItems()->with('orderProduct')->get();
        return view('school.invoice', compact('order', 'orderItems', 'status', 'school', 'message'));
    }

    public function viewInvoiceToAdmin(int $orderId)
    {
        $status = null;
        $message = null;
        $order = $this->order->where('id', $orderId, 'school')->first();
        if (!$order) {
            return redirect()->back()->with('status', 'error')->with('message', 'Order not found.');
        }
        $school = $order->school;
        $orderItems = $order->orderItems()->with('orderProduct')->get();
        return view('admin.invoice', compact('order', 'orderItems', 'status', 'school', 'message'));
    }


    public function orderListToSchool(Request $request)
    {
        $status = null;
        $message = null;
        $schoolSession = $this->getSchoolSession($request);
        $uuid = $schoolSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();
        $orders = $this->order->where('school_id', $school->id)->get();

        return view('school.order', compact('orders'))->render();
    }

    public function viewTransectionToSchool(Request $request)
    {
        $status = null;
        $message = null;
        $schoolSession = $this->getSchoolSession($request);
        $uuid = $schoolSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();
        $orders = $this->order->where('school_id', $school->id)->get();
        $transections = $this->orderTransection->with('order')->get();
        $remainingAmount = $orders->first() ? $orders->first()->remaining_amount : null;

        return view('school.transactions', compact('transections', 'orders', 'remainingAmount'));
    }

    public function viewTransectionToAdmin(Request $request)
    {
        $status = null;
        $message = null;
        $orders = $this->order->with('school')->get();
        $transections = $this->orderTransection->with('order')->get();
        $remainingAmount = $orders->first() ? $orders->first()->remaining_amount : null;

        return view('admin.transactions', compact('transections', 'orders', 'remainingAmount'));
    }

    public function storeTransaction(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'order_id'       => 'required',
                'transection_id' => 'required',
                'amount'         => 'required',
            ]);

            $order = $this->order->find($validatedData['order_id']);

            if (!$order) {
                return redirect()->back()->with('status', 'error')->with('message', 'Order not found.');
            }

            if ($order->remaining_Amount >= $validatedData['amount']) {
                $order->remaining_Amount -= $validatedData['amount'];
                $order->save();

                $orderTransection = new $this->orderTransection([
                    'transection_id' => $validatedData['transection_id'],
                    'amount'         => $validatedData['amount'],
                ]);
                $order->orderTransections()->save($orderTransection);

                return redirect()->back()->with('status', 'success')->with('message', 'Transaction added successfully.');
            } else {

                return redirect()->back()->with('status', 'error')->with('message', 'Insufficient remaining amount.');
            }
        } catch (\Exception $e) {
            Log::error('[OrderController][storeTransaction] Error Adding Transections ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Error Adding Transections');
        }
    }

    public function updateStatus(Request $request)
    {
        $orderId = $request->input('orderId');
        $statusType = $request->input('statusType');
        $statusValue = $request->input('statusValue');

        $order = $this->order->find($orderId);

        switch ($statusType) {
            case 'paymentStatus':
                $order->payment_status = $statusValue;
                break;
            case 'paymentMethod':
                $order->payment_method = $statusValue;
                break;
            case 'orderStatus':
                // Check if the status is being updated to 'approved'
                if ($statusValue === OrderStatusEnum::APPROVED) {
                    // Check if order item quantity is greater than book quantity
                    $insufficientQuantity = $this->checkOrderItemQuantity($order);

                    // If quantity is insufficient, return an alert
                    if ($insufficientQuantity) {
                        return response()->json(['error' => 'Insufficient book quantity'], 400);
                    }
                
                }

                
                $order->order_status = $statusValue;
                // $this->checkOrderItemQuantity($order);

                break;
            default:
                return response()->json(['error' => 'Invalid status type'], 400);
        }

        $order->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    // Helper function to check order item quantity
   // Helper function to check order item quantity
private function checkOrderItemQuantity($order)
{
    foreach ($order->orderItems as $orderItem) {
        $bookDetails = $this->bookDetail->find($orderItem->book_id);

        if (!$bookDetails) {
            Log::error('[OrderController][checkOrderItemQuantity] Book details not found for book_id=' . $orderItem->book_id);
            continue;
        }

        // If book quantity in the table is less than the order item quantity, return true
        if ($bookDetails->quantity < $orderItem->quantity) {
            return true;
        }

        // Subtract the order item quantity from the book quantity
        $bookDetails->quantity -= $orderItem->quantity;
        $bookDetails->save();
    }

    // If all order item quantities are within book quantity, return false
    return false;
}

public function storeTransactionforadmin(Request $request)
{
    try {
        $validatedData = $request->validate([
            'order_id'       => 'required',
            'transection_id' => 'required',
            'amount'         => 'required',
        ]);

        $order = $this->order->find($validatedData['order_id']);

        if (!$order) {
            return redirect()->back()->with('status', 'error')->with('message', 'Order not found.');
        }

        if ($order->remaining_Amount >= $validatedData['amount']) {
            $order->remaining_Amount -= $validatedData['amount'];
            $order->save();

            $orderTransection = new $this->orderTransection([
                'transection_id' => $validatedData['transection_id'],
                'amount'         => $validatedData['amount'],
            ]);

            // Ensure that the order_id column in your order_transections table is properly associated.
            $orderTransection->order()->associate($order);
            $orderTransection->save();

            return redirect()->back()->with('status', 'success')->with('message', 'Transaction added successfully.');
        } else {
            return redirect()->back()->with('status', 'error')->with('message', 'Insufficient remaining amount.');
        }
    } catch (\Exception $e) {
        Log::error('[OrderController][storeTransactionforadmin] Error Adding Transections ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
        return redirect()->back()->with('status', 'error')->with('message', 'Error Adding Transections');
    }
}
public function getTotalOrderCount(Request $request)
    {  
        $schoolUuid = $this->getSchoolSession($request);
        $schoolDetails = $this->schoolDetails->where('uuid', $schoolUuid)->first();
        $totalOrders = $this->order->where('school_id', $schoolDetails->id)->count();
      
        $approvedOrders = $this->order->where('school_id', $schoolDetails->id)
            ->where('order_status', OrderStatusEnum::APPROVED)->count();
        $pendingOrders = $this->order->where('school_id', $schoolDetails->id)
            ->where('order_status', OrderStatusEnum::PENDING)->count();
        $cancledOrders = $this->order->where('school_id', $schoolDetails->id)
            ->where('order_status', OrderStatusEnum::CANCELLED)->count();
        return response()->json([
            'totalOrders'    => $totalOrders,
            'approvedOrders' => $approvedOrders,
            'pendingOrders'  => $pendingOrders,
            'cancledOrders' => $cancledOrders
        ]);
    } 
public function getSalesReportData()
{
    $schoolDetails = $this->schoolDetails->get();
    
    $salesData = [];

    foreach ($schoolDetails as $school) {
        $totalOrders = $this->order->where('school_id', $school->id)->count();
        $salesData[] = [
            'school_name' => $school->school_name,
            'total_orders' => $totalOrders,
        ];
    }

    return response()->json($salesData);
}

// Add this method to your OrderController
public function getPurchaseReportData(Request $request)
{
    $schoolSession = $this->getSchoolSession($request);
    $uuid = $schoolSession['uuid'];
    $school = $this->schoolDetails->where('uuid', $uuid)->first();

    // Fetch total purchase data for the school
    $totalPurchaseData = $this->order->where('school_id', $school->id)->get();

    // Return as an array
    return response()->json($totalPurchaseData);
}



}