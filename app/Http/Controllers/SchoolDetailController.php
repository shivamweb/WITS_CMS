<?php

namespace App\Http\Controllers;

use App\Enums\UserGroupEnum;
use App\Models\BookDetail;
use App\Models\BookSchool;
use App\Models\AgreementImage;
use App\Models\Classes;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Models\SchoolDetail;
use App\Traits\SessionTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SchoolDetailController extends Controller
{
    use SessionTrait;

    private $schooldetail;
    private $books;
    private $classes;
    private $bookSchool;

    public function __construct(
        SchoolDetail $schooldetail,
        Classes $classes,
        BookDetail $books,
        BookSchool $bookSchool,
        AgreementImage $agreementImage
    ) {
        $this->schooldetail = $schooldetail;
        $this->classes = $classes;
        $this->books = $books;
        $this->bookSchool = $bookSchool;
        $this->agreementImage = $agreementImage;
    }

    public function showSchoolLoginForm(Request $request)
    {
        $status = null;
        $message = null;
        return view('school.school-login', compact('status', 'message'));
    }

    public function Schoolsignin(Request $request)
    {

        try {
            $credentials = $request->all();
            $school = $this->schooldetail->where([
                'email'    => $credentials['email'],
                'password' => $credentials['password']
            ])->first();

            if (!$school) {
                session()->flush();
                return redirect()->back()->with('status', 'error')->with('message', 'Invalid credential');
            }
            $this->storeSchoolSession($school);
            return redirect('/school/profile')->with('status', 'success')->with('message', 'login successfully');
        } catch (\Exception $e) {
            Log::error('[SchoolDetailController][signin] Error Login school ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Invalid credentials or account is not active');
        }
    }
    public function createSchool(Request $request)
    {
        try {
            $this->validate($request, [
                'school_name'          => 'required',
                'email'                => 'required|email|unique:school_details,email',
                'password'             => 'required|min:8|',

            ]);
            $school = $this->schooldetail->create([
                'school_name' => $request->input('school_name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'user_type'     => UserGroupEnum::SCHOOL,
            ]);

            return redirect()->back()->with('status', 'error')->with('message', 'School Registered succesfully credential');
        } catch (ValidationException $e) {

            $errors = $e->validator->getMessageBag();
            Log::error('[SchoolDetailController][createSchool]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect()->back()->with('status', 'error')->with('message', 'School not registered successfully !')->with('errors', $errors);
        }
    }
    public function showProfile(Request $request)
    {
        $schoolSession = $this->getSchoolSession($request);
        $uuid = $schoolSession['uuid'];
        $schooldetails = $this->schooldetail->where('uuid', $uuid)->first();
        $status = null;
        $message = null;
        return view('school.profile', compact('status', 'message', 'schooldetails'));
    }
    public function storeSchoolProfile(Request $request)
    {
        try {
            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $this->validate($request, [
                'school_name' => 'required',
                'image' => 'required',
                'email'  => 'required',
                'password' => 'required',
                'mobile_number' => 'required',
                'country' => 'required',
                'state' => 'required',
                'address' => 'required',
                'pin_code' => 'required',
                'school_zone' => 'required',

                'image.*'      => 'image|mimes:jpeg,png,jpg,svg|max:2048|dimensions:width=232,height=218',
            ]);
            $imagefile = $request->file('image');
            $filename = time() . '_' . $imagefile->getClientOriginalName();
            $imagePath = 'SchoolImage/' . $filename;
            $imagefile->move(public_path('SchoolImage/'), $filename);

            $schoolProfileData = $request->all();
            $this->schooldetail->completeSchoolProfile($schoolProfileData, $uuid, $imagePath);

            return redirect()->back()->with('status', 'success')->with('message', 'School profile completed');
        } catch (ValidationException $e) {

            $errors = $e->validator->getMessageBag();
            Log::error('[SchoolDetailController][storeSchoolProfile]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect()->back()->with('status', 'error')->with('message', 'Profile not completed successfully !')->with('errors', $errors);
        } catch (\Exception $e) {
            Log::error('[SchoolDetailController][storeSchoolProfile] Error creating user: '  . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message',  'Profile not completed successfully!' . $e->getMessage());
        }
    }

    public function storeSchoolFaculityDetail(Request $request)
    {
        try {

            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $this->validate($request, [
                'faculity_name'     => 'required',
                'faculity_email'    => 'required',
                'faculity_mobileno' => 'required',
                'faculity_gender'   => 'required',
                'designation'       => 'required',
            ]);

            $schoolfaculitydetail = $request->all();
            $this->schooldetail->completeSchoolFaculityDetail($schoolfaculitydetail, $uuid);

            return redirect()->back()->with('status', 'success')->with('message', 'Faculity Uploaded successfully');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[SchoolDetailController][storeSchoolFaculityDetail]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect()->back()->with('status', 'error')->with('message', 'Faculity not updated!')->with('errors', $errors);
        } catch (\Exception $e) {
            Log::error('[SchoolDetailController][storeSchoolFaculityDetail] Error creating user: '  . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message',  'Faculity not updated!' . $e->getMessage());
        }
    }

    // public function storeSchoolDocument(Request $request)
    // {
    //     try {

    //         $schoolSession = $this->getSchoolSession($request);
    //         $uuid = $schoolSession['uuid'];
    //         $this->validate($request, [
    //             'school_document'    => 'required',
    //         ]);
    //         $imagefile = $request->file('school_document');  // Corrected input name
    //         $filename = time() . '_' . $imagefile->getClientOriginalName();
    //         $imagePath = 'SchoolDocImage/' . $filename;
    //         $imagefile->move(public_path('SchoolDocImage/'), $filename);

    //         $schooldocument = $request->all();
    //         $this->schooldetail->completeSchoolDocument($schooldocument, $uuid, $imagePath);

    //         return redirect()->back()->with('status', 'success')->with('message', 'Document Uploaded successfully');
    //     } catch (ValidationException $e) {
    //         $errors = $e->validator->getMessageBag();
    //         Log::error('[SchoolDetailController][storeSchoolDocument]Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
    //         return redirect()->back()->with('status', 'error')->with('message', 'Document not updated!')->with('errors', $errors);
    //     } catch (\Exception $e) {
    //         Log::error('[SchoolDetailController][storeSchoolDocument] Error creating user: '  . 'Request=' . $request . ', Exception=' . $e->getMessage());
    //         return redirect()->back()->with('status', 'error')->with('message',  'Document not updated!' . $e->getMessage());
    //     }
    // }

    public function addschoolforAdmin(Request $request)
    {
        try {
            $this->validate($request, [
                'school_name'   => 'required',
                'email'         => 'required|email',
                'password'      => 'required|min:8',
                'mobile_number' => 'required',
                'country'       => 'required',
                'state'         => 'required',
                'address'       => 'required',
                'pin_code'      => 'required',
                'school_zone'   => 'required',
            ]);

            $addschoolforadmin = $request->all();

            // Assuming 'addschoolforadmin' is a method in the SchoolDetail model
            $this->schooldetail->addschoolforadmin($addschoolforadmin);

            return redirect()->back()->with('status', 'success')->with('message', 'School added successfully.');
        } catch (\Throwable $e) {
            Log::error('[SchoolDetailController][addschoolforAdmin] Error School is not added ' . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('error', 'An error occurred during adding school.');
        }
    }

    public function viewSchool()
    {
        $status = null;
        $message = null;
        $schooldetail = $this->schooldetail->all();
        return view('admin.add-school', compact('schooldetail', 'status', 'message'));
    }


    public function fetchschoolListforAdmin()
    {
        $status = null;
        $message = null;
        $schooldetails = $this->schooldetail->all();
        return view('admin.list-school', compact('schooldetails', 'status', 'message'));
    }

    public function viewSchoolDetails(string $uuid)
    {
        $status = null;
        $message = null;
        $schooldetails = $this->schooldetail->where('uuid', $uuid)->first();
        $classesWithBooks = $this->classes->with('books')->get();

        return view('admin.view-schooldetail', compact('schooldetails', 'classesWithBooks', 'status', 'message'));
    }

    public function editSchool(string $uuid)
    {
        $schooldetails = $this->schooldetail->find($uuid);


        if ($schooldetails) {
            return view('admin.view-detail', ['schooldetails' => $schooldetails]);
        }
        return redirect('/admin/list-school')->with('error', 'School not found.');
    }

    public function updateSchool(Request $request, string $uuid)
    {
        try {
            $schooldetails = $this->schooldetail->where('uuid', $uuid)->first();

            if (!$schooldetails) {
                return redirect()->back()->with('error', 'School not found.');
            }

            $this->validate($request, [
                'school_zone' => 'required',
            ]);

            $newSchoolData = $request->all();
            $schooldetails->update($newSchoolData);
            return redirect('/admin/list-school')->with('status', 'success')->with('message', 'Product updated successfully.');
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            Log::error('[SchoolDetailController][updateSchool] Validation error: ' . 'Request=' . $request . ', Errors =' . implode(', ', $errors->all()));
            return redirect()->back()->with('status', 'error')->with('message', 'Product not updated.')->with('errors', $errors);
        } catch (\Exception $e) {
            Log::error('[SchoolDetailController][updateSchool] Error updating product: ' . 'Request=' . $request . 'Id=' . ', Exception=' . $e->getMessage());
            return redirect()->back()->with('status', 'error')->with('message', 'Product not updated.');
        }
    }

    public function addBookToSchool(Request $request)
    {
        try {
            $bookId = $request->input('book_id');
            $schoolId = $request->input('school_id');
            $isAnyCheckboxChecked = $request->input('isAnyCheckboxChecked');

            if ($isAnyCheckboxChecked) {
                $this->bookSchool->create([
                    'book_id' => $bookId,
                    'school_id' => $schoolId,
                ]);
                return response()->json(['status' => 'success', 'message' => 'Book added for the school successfully']);
            }

            $this->bookSchool->where('school_id', $schoolId)->where('book_id', $bookId)->delete();
            return response()->json(['status' => 'success', 'message' => 'Book removed for the school successfully']);
        } catch (\Exception $e) {
            Log::error('[SchoolDetailController][addBookToSchool] Error updating books for the school: ' . 'Request=' . $request . ', Exception=' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Error updating books for the school']);
        }
    }

    public function removeBookFromSchool(Request $request)
    {
        $request->validate([
            'book_id'   => 'required|integer',
            'school_id' => 'required|integer',
        ]);

        $this->bookSchool->where('book_id', $request->book_id)
            ->where('school_id', $request->school_id)
            ->delete();

        return response()->json(['message' => 'Book removed from school']);
    }

    public function isBookAssociatedWithSchool(Request $request, $bookId)
    {
        $isAssociated = $this->bookSchool->where('book_id', $bookId)
            ->where('school_id', $request->input('school_id'))
            ->exists();

        return response()->json(['isAssociated' => $isAssociated]);
    }

    public function fetchSchoolDetails(Request $request)
    {
        try {
            $status = null;
            $message = null;
            $schoolSession = $this->getSchoolSession($request);
            $uuid = $schoolSession['uuid'];
            $SchoolDetails = $this->schooldetail->where('uuid', $uuid)->first();
            return new JsonResponse(['SchoolDetails' => $SchoolDetails, 'status' => $status, 'message' => $message]);
        } catch (\Exception $e) {
            Log::error('[SchoolDetailController][fetchSchoolDetails] Error: ' . $e->getMessage());
            return new JsonResponse(['status' => 'error', 'message' => 'Error fetching school details.']);
        }
    }
   
    public function Schoollogout()
    {
        $uuid = Session::get('uuid');
        Session::forget('uuid');
    
        Session::flash('success', 'You have been logged out.');
        return redirect('/show-login');
    }

    public function addAgreement(Request $request)
    {
        $schoolSession = $this->getSchoolSession($request);
        $uuid = $schoolSession['uuid'];
        $SchoolDetails = $this->schooldetail->where('uuid', $uuid)->first();
        if ($request->hasFile('school_document')) {
            foreach ($request->file('school_document') as $image) {
                $filename =   '_' . $image->getClientOriginalName();
                $imagePath = 'agreement_images/' . $filename;
                $image->move(public_path('agreement_images/'), $filename);
    
                $this->agreementImage->create([
                    'school_id' => $SchoolDetails->id,
                    'image'     => $imagePath,
                ]);
            }
        }
        return redirect()->back()->with('status','success')->with('message','Agreement added successfully.');
    }
   
}
