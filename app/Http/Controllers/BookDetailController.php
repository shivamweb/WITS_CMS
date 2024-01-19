<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Models\BookSchool;
use App\Models\Classes;
use App\Models\Order;
use App\Models\SchoolDetail;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookDetailController extends Controller
{
    use SessionTrait;

    private $bookdetails, $classes, $bookSchool, $schoolDetails, $orders;
    public function __construct(
        BookDetail $bookdetail,
        Classes $class,
        BookSchool $bookSchool,
        SchoolDetail $schoolDetails,
        Order $orders,
    ) {
        $this->bookdetails = $bookdetail;
        $this->classes = $class;
        $this->bookSchool = $bookSchool;
        $this->schoolDetails = $schoolDetails;
        $this->orders = $orders;
    }

    public function addbookDetails(Request $request)
    {

        try {
            $this->validate($request, [
                'image'        => 'required',
                'book_name'    => 'required',
                'status'       => 'required',
                'stock_status' => 'required',
                'price'        => 'required',
                'class_id'     => 'required',
                'description'  => 'required',
                'part'         => 'required',
                'publisher'    => 'required',
                'quantity'     => 'required',
                'image.*'      => 'image|mimes:jpeg,png,jpg,svg',
            ]);

            $imagefile = $request->file('image');
            $filename = time() . '_' . $imagefile->getClientOriginalName();
            $imagePath = 'BookImage/' . $filename;
            $imagefile->move(public_path('BookImage/'), $filename);

            $this->bookdetails->AddBookDetail($request->all(), $imagePath);
            return back()->with('status', 'success')->with('message', 'Book Added Succesfully');
        } catch (\Exception $e) {
            Log::error('[BookDetailController][addbookDetails]Validation error: ' . 'Request=' . $request);
            return back()->with('status', 'error')->with('message', 'Book Not Added ');
        }
    }

    public function viewBook(Request $request)
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->all();
        $classes = $this->classes->all();
        return view('admin.add-new-book', compact('status', 'message', 'bookdetails', 'classes'));
    }

    public function viewBookDetails(string $uuid)
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->where('uuid', $uuid)->first();
        return view('school.view-book-detail', compact('bookdetails', 'status', 'message'));
    }

    public function listbookforadmin()
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->with('class')->get();

        // Pass book details to the view
        return view('admin.list-book', compact('bookdetails'))->with([
            'chartData' => $this->getChartData($bookdetails),
        ]);
    }

    public function fetchBookDetail(Request $request)
    {
        $status = null;
        $message = null;
        $adminSession = $this->getSchoolSession($request);
        $uuid = $adminSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();

        $bookdetails = $this->bookSchool
            ->where('school_id', $school->id)
            ->with('book.class') // Include the necessary relationships
            ->get();
        return view('school.place-neworder', compact('bookdetails'))->render();
    }

    public function purchasedBooksList(Request $request)
    {
        $adminSession = $this->getSchoolSession($request);
        $uuid = $adminSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();
    
        // Fetch orders associated with the school
        $orders = $this->orders->where('school_id', $school->id)->with('orderItems.orderProduct')->get();
    
        // Extract book details from order items
        $purchasedBooks = [];
        $bookTracker = [];
    
        foreach ($orders as $order) {
            foreach ($order->orderItems as $orderItem) {
                $book = $orderItem->orderProduct;
    
                // Check if the book has already been added to the list
                if (!isset($bookTracker[$book->uuid])) {
                    $purchasedBooks[] = [
                        'title'   => $book->book_name,
                        'image'   => $book->image,
                        'price'   => $book->price,
                        'uuid'    => $book->uuid,
                    ];
    
                    // Mark the book as added in the tracker
                    $bookTracker[$book->uuid] = true;
                }
            }
        }
    
        return view('school.my-purchase-list', ['purchasedBooks' => $purchasedBooks]);
    }

    public function fetchApprovedBookDetail(Request $request)
    {
        $status = null;
        $message = null;
        $adminSession = $this->getSchoolSession($request);
        $uuid = $adminSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();

        $bookdetails = $this->bookSchool
            ->where('school_id', $school->id)
            ->with('book.class')
            ->get();
        return view('school.approved-bookList', compact('bookdetails'))->render();
    }

    public function getChartData()
    {
        $bookdetails=$this->bookdetails->get();
      
        $chartData = [];
       
        foreach ($bookdetails as $book) {
            $chartData[] = [
                'book_name' => $book->book_name,
                'quantity'  => $book->quantity,
            ];
        }
    
        return $chartData;
    }
    
    public function managestockforadmin()
    {
        $status = null;
        $message = null;
        $bookdetails = $this->bookdetails->with('class')->get();

    
        return view('admin.managestock', compact('bookdetails','status','message'));
    }

    // ... (existing code remains unchanged) ...

public function fetchDataByDate(Request $request)
{ dd($request);
    try {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // Validate the input if needed

        $bookdetails = $this->bookdetails
            ->whereBetween('date', [$startDate, $endDate])
            ->get();

        $chartData = [];
        foreach ($bookdetails as $book) {
            $chartData[] = [
                'book_name' => $book->book_name,
                'quantity'  => $book->quantity,
            ];
        }

        return response()->json(['success' => true, 'chartData' => $chartData]);
    } catch (\Exception $e) {
        Log::error('[BookDetailController][fetchDataByDate] Error: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Error fetching data']);
    }
}


}
