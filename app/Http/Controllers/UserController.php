<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $user;

    public function __construct(
        User $user
    ) {
        $this->user = $user;
    }

    public function viewUser(Request $request)
    {
        $status = null;
        $message = null;
        $users = $this->user->all();

        return view('admin.add-user', compact('status', 'message', 'users'));
    }

    public function addNewUser(Request $request)
    {
        // dd($request);
        try {
            $this->validate($request, [

                'name'    => 'required',
                'email'       => 'required',
                'mobile_number'        => 'required',
                'state'        => 'required',
                'address'        => 'required',
                'pin_code'        => 'required',
                'city'        => 'required',

            ]);
            $data = $request->all();
            $user = User::create($data);
            // $user = $this->user->addNewUserDetails($data);
            // dd($user);
            return redirect()->back()->with('status', 'success')->with('message', 'supplier Added Succesfully');
        } catch (\Exception $e) {
            dd($e);
            Log::error('[UserController][addNewUser]Validation error: ' . 'Request=' . $request);
            return redirect()->back()->with('status', 'error')->with('message', 'Users Not Added ');
        }
    }

    public function listuser()
    {

        $status = null;
        $message = null;
        $users = $this->user->all();

        return view('admin.add-user', compact('status', 'message', 'users'))->render();
    }

    public function deleteUser(Request $request, $id)
    {
        try {
            // Find the class by ID
            $user = user::findOrFail($id);

            // Delete the associated book details
            $this->user->delete();

            // Delete the class itself
            $user->delete();

            return redirect()->back()->with('status', 'success')->with('message', 'User and related Users deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error')->with('message', 'Failed to delete User and related books');
        }
    }

    public function viewUserDetails(string $uuid)
    {
        $status = null;
        $message = null;
        $userdetails = $this->user->where('uuid', $uuid)->first();
        //$classesWithBooks = $this->classes->with('books')->get();

        return view('admin.view-userdetail', compact('userdetails', 'status', 'message'));
    }


}
