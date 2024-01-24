<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use Illuminate\Http\Request;
use App\Models\AdminDetail;
use App\Models\BookDetail;
use App\Models\Order;
use App\Models\SchoolDetail;
use Illuminate\Support\Facades\Log;
use App\Traits\SessionTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class AdminDetailController extends Controller
{
    use SessionTrait;
    private $adminDetails;
    private $schoolDetail;
    private $bookDetail;
    private $order;

    public function __construct(
        AdminDetail $adminDetails,
        SchoolDetail $schoolDetail,
        BookDetail $bookDetail,
        Order $order,
    ) {
        $this->adminDetails =  $adminDetails;
        $this->schoolDetail =  $schoolDetail;
        $this->bookDetail =  $bookDetail;
        $this->order =  $order;
    }
    public function showAdminLoginForm(Request $request)
    {
        $status = null;
        $message = null;
        return view('admin.admin-login', compact('status', 'message'));
    }
    public function Adminsignin(Request $request)
    {
        try {
            $credentials = $request->all();
            $admin = $this->adminDetails->where([
                'email'    => $credentials['email'],
                'password' => $credentials['password']
            ])->first();

            if (!$admin) {
                session()->flush();
                return redirect('/admin-login')->with('status', 'error')->with('message', 'Invalid credential');
            }
            $this->storeAdminSession($admin);
            return redirect('/profile');
        } catch (\Exception $e) {

            Log::error('[AdminDetailController][signin] Error Login admin ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect('/admin/profile')->with('error', 'An error occurred during login.');
        }
    }
    public function showAdminProfile(Request $request)
    {
        $adminSession = $this->getAdminSession($request);
        $uuid = $adminSession['uuid'];
        $adminDetails = $this->adminDetails->where('uuid', $uuid)->first();
        $status = null;
        $message = null;
        return view('admin.profile', compact('status', 'message', 'adminDetails'));
    }
    public function createAdmin(Request $request)
    {

        try {
            $this->validate($request, [
                'firstname'       => 'required',
                'lastname'        => 'required',
                'email'           => 'required|email|unique:users,email',
                'password'        => 'required|min:8|',

            ]);
            $admin = $this->adminDetails->create([
                'firstname'     => $request->input('firstname'),
                'lastname'      => $request->input('lastname'),
                'email'         => $request->input('email'),
                'password'      => $request->input('password'),
            ]);

            return redirect('/admin-login');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[AdminDetailController][create]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect('/admin-login')->with('status', 'error')->with('message', 'Admin not registered successfully !')->with('errors', $errors);
        } catch (\Exception $e) {
            Log::error('[AdminDetailController][create] Error creating user: '  . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect('/admin-login')->with('status', 'error')->with('message',  'Profile not registered successfully!' . $e->getMessage());
        }
    }
    public function storeAdminProfile(Request $request)
    {
        try {
            $adminSession = $this->getAdminSession($request);
            $uuid = $adminSession['uuid'];
            $this->validate($request, [
                'firstname'     => 'required',
                'lastname'      => 'required',
                'mobile_number' => 'required',
                'image'         => 'required|mimes:jpeg,png,jpg,gif,avif|max:2048',
            ]);

            $imagePath = null;

            if ($request->hasFile('image')) {
                $adminImage = $request->file('image');
                $filename = time() . '_' . $adminImage->getClientOriginalName();
                $imagePath = 'adminProfile_images/' . $filename;
                $adminImage->move(public_path('adminProfile_images/'), $filename);
            }
            $adminProfileData = $request->all();
            $this->adminDetails->completeAdminProfile($adminProfileData, $imagePath, $uuid);

            return redirect()->back()->with('status', 'success')->with('message', 'Admin profile completed');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[AdminDetailController][storeAdminProfile]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect()->back()->with('status', 'error')->with('message', 'Profile not comleted successfully !')->with('errors', $errors);
        }
    }
    public function Adminlogout()
    {
        $uuid = Session::get('uuid');
        Session::forget('uuid');

        Session::flash('success', 'You have been logged out.');
        return redirect('/admin-login');
    }

    public function getTotalCount()
    {
        $totalSchools = $this->schoolDetail->count();
      
        $totalBooks = $this->bookDetail->count();
        // $totalOrders = $this->order->count();
        $totalDeliveredOrders = $this->order->where('order_status', OrderStatusEnum::DELIVERED)
            ->count();
        $totalApprovedOrders = $this->order->where('order_status', OrderStatusEnum::APPROVED)
            ->count();
        $totalShippedOrders = $this->order->where('order_status', OrderStatusEnum::SHIPPED)
            ->count();
        $totalProcessingOrders = $this->order->where('order_status', OrderStatusEnum::PROCESSING)
            ->count();
        $totalCancelledOrders = $this->order->where('order_status', OrderStatusEnum::CANCELLED)
            ->count();
        $totalPendingOrders = $this->order->where('order_status', OrderStatusEnum::PENDING)
            ->count();
        return response()->json([
            'totalSchools'         => $totalSchools,
            'totalBooks'           => $totalBooks,
            'totalDeliveredOrders' => $totalDeliveredOrders,
            'totalApprovedOrders'   => $totalApprovedOrders,
            'totalShippedOrders'     => $totalShippedOrders,
            'totalProcessingOrders'  => $totalProcessingOrders,
            'totalCancelledOrders'  => $totalCancelledOrders,
            'totalPendingOrders'  => $totalPendingOrders,
        ]);
    }

    public function fetchAdminPhotos(Request $request){
    try {
       $status = null;
       $message = null;
       $adminSession = $this->getAdminSession($request);
      $uuid = $adminSession['uuid'];
    $AdminPhotos = $this->adminDetails->where('uuid', $uuid)->first();
    // dd();
    return new JsonResponse(['AdminPhotos' => $AdminPhotos, 'status' => $status, 'message' => $message]);
    } 
    catch (\Exception $e) {
    Log::error('[AdminDetailController][fetchAdminDetails] Error: ' . $e->getMessage());
    return new JsonResponse(['status' => 'error', 'message' => 'Error fetching admin photo.']);
    }
}
}

