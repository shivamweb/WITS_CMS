<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\SchoolDetail;
use App\Models\AdminDetail;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Traits\SessionTrait;
use Illuminate\Validation\ValidationException;
class NotificationController extends Controller
{

    use SessionTrait;
    private $notification;
    private $schooldetail;
    private $admindetail;

    public function __construct(Notification $notification ,SchoolDetail $schooldetails ,AdminDetail $admindetails)
    {
        $this->notification = $notification;
        $this->schooldetail = $schooldetails;
        $this->admindetail = $admindetails;
    }

    public function viewNotification()
    {
        $status = null;
        $message = null;
        $schooldetails = $this->schooldetail->all();
        return view('admin.add-notification', ['schooldetails' => $schooldetails], compact('status', 'message'));
    }

    public function sendNotification(Request $request)
    {
        try {
            $request->validate([
                'to'          => 'required',
                'description' => 'required',
            ]);
            $to = $request->input('to');
            $description = $request->input('description');
            $adminSession = $this->getAdminSession($request);
            $uuid = $adminSession['uuid'];
            $admindetails = $this->admindetail->where('uuid', $uuid)->first();
            if ($to === 'all') {
                // Loop through all users and create a notification for each user
                $schooldetails = $this->schooldetail->all();
                foreach ($schooldetails as $recipient) {
                    $this->notification::create([
                        'to'          => $recipient->id,
                        'description' => $description,
                        'created_by'  => $admindetails->id,
                    ]);
                }
            } else {
                // Create a notification for the selected user
                $this->notification::create([
                    'to'          => $to,
                    'description' => $description,
                    'created_by'  => $admindetails->id,
                ]);
            }

            return redirect('/admin/notificationAddView')->with('status', 'success')->with('message', 'Notification sent successfully');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[NotificationController][sendNotification]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect('/admin/notificationAddView')->with('status', 'error')->with('message', 'Failed to send notification: ')->with('errors', $errors);
        } catch (\Exception $e) {
            Log::error('[NotificationController][sendNotification] Error sending notification: ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect('/admin/notificationAddView')->with('status', 'error')->with('message', 'Failed to send notification: ' . $e->getMessage());
        }
    }

    public function showNotifications(Request $request)
    {
        try {
            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $schooldetails =  $this->schooldetail->where('uuid', $uuid)->first();
            $this->notification->where('to', $schooldetails->id)->update(['status' => 'read']);
            $notifications = $this->notification::where('to', $schooldetails->id)->with('createdByUser')->get();
            return view('school.notification', ['notifications' => $notifications]);
        } catch (\Exception $e) {
            Log::error('[NotificationController][showNotifications] Error viewing notification: ' . ' Exception=' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function showNotificationsAdmin(Request $request)
    {
        try {
            $adminSession = $this->getAdminSession($request);
          
            $notifications = $this->notification->get();
            return view('admin.notification', ['notifications' => $notifications]);
        } catch (\Exception $e) {
            Log::error('[NotificationController][showNotificationsAdmin] Error viewing notification: ' . 'Exception='. $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    

    public function getNotifications(Request $request): JsonResponse
    {
        try {
            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $schooldetails =  $this->schooldetail->where('uuid', $uuid)->first();
            $unreadCount = $this->notification::where('to', $schooldetails->id)->where('status', 'Un-read')->count();
            $notifications = $this->notification::where('to', $schooldetails->id) ->where('status', 'Un-read')->with('createdByUser')->get();

            return response()->json([
                'notifications' => json_encode($notifications),
                'unreadCount' => $unreadCount,
            ], 200);
        } catch (\Exception $e) {
            Log::error('[NotificationController][getNotifications] Error fetching notifications: ' . 'Exception' . $e->getMessage());
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

} 
