<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\SchoolDetail;
use App\Models\AdminDetail;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

use Illuminate\Validation\ValidationException;

class InquiryController extends Controller
{
    use SessionTrait;
    private $inquiry;
    private $schooldetail;
    private $admindetail;

    public function __construct(Inquiry $inquiry, SchoolDetail $schooldetails, AdminDetail $admindetails)
    {
        $this->inquiry = $inquiry;
        $this->schooldetail = $schooldetails;
        $this->admindetail = $admindetails;
    }
    public function viewInquiry()
    {
        $status = null;
        $message = null;
        $admindetails = $this->admindetail->all();
        return view('school.add-inquiry', ['admindetails' => $admindetails], compact('status', 'message'));
    }
    public function sendInquiry(Request $request)
    {
        try {
            $request->validate([
                'to'          => 'required',
                'description' => 'required',
            ]);
            $to = $request->input('to');
            $description = $request->input('description');
            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $schooldetails = $this->schooldetail->where('uuid', $uuid)->first();
            if ($to === 'all') {
                // Loop through all users and create a notification for each user
                $admindetails = $this->admindetail->all();
                foreach ($admindetails as $recipient) {
                    $this->inquiry::create([
                        'to'          => $recipient->id,
                        'description' => $description,
                        'created_by'  => $schooldetails->id,
                    ]);
                }
            } else {
                // Create a notification for the selected user
                $this->inquiry::create([
                    'to'          => $to,
                    'description' => $description,
                    'created_by'  => $schooldetails->id,
                ]);
            }

            return redirect('/school/inquiryaddview')->with('status', 'success')->with('message', 'Inquiry sent successfully');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[InquiryController][sendInquiry]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect('/school/inquiryaddview')->with('status', 'error')->with('message', 'Failed to send Inquiry: ')->with('errors', $errors);
        } catch (\Exception $e) {
            Log::error('[InquiryController][sendInquiry] Error sending inquiry: ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect('/school/inquiryaddview')->with('status', 'error')->with('message', 'Failed to send Inquiry: ' . $e->getMessage());
        }
    }
    public function showInquiryforadmin(Request $request)
    {
        try {
            $adminSession = $this->getAdminSession($request);
            $uuid = $adminSession['uuid'];
            $admindetails =  $this->admindetail->where('uuid', $uuid)->first();
            $this->inquiry->where('to', $admindetails->id)->update(['status' => 'read']);
            $inquirys = $this->inquiry::where('to', $admindetails->id)->with('createdByUser')->get();
            return view('admin.list-inquiry', ['inquiry' => $inquirys]);
        } catch (\Exception $e) {
            Log::error('[InquiryController][showInquiryforadmin] Error viewing inquiry: ' . ' Exception=' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function showinquiryforSchool(Request $request)
    {
        try {
            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $schooldetails =  $this->schooldetail->where('uuid', $uuid)->first();
            $inquiry = $this->inquiry->where('created_by', $schooldetails->id)->get();
        
            return view('school.inquiry', ['inquiry' => $inquiry]);
        } catch (\Exception $e) {
            Log::error('[InquiryController][showinquirySchool] Error viewing inquiry: ' . 'Exception=' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function getinquiry(Request $request): JsonResponse
    {
        try {
            $adminSession = $this->getAdminSession($request);
            $uuid = $adminSession['uuid'];
            $admindetails =  $this->admindetail->where('uuid', $uuid)->first();
            $unreadCount = $this->inquiry::where('to', $admindetails->id)->where('status', 'Un-read')->count();
            $inquiry = $this->inquiry->get();

            return response()->json([
                'inquiry' => json_encode($inquiry),
                'unreadCount' => $unreadCount,
            ], 200);
        } catch (\Exception $e) {
            Log::error('[InquiryController][getinquiry] Error fetching inquiry: ' . 'Exception' . $e->getMessage());
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
