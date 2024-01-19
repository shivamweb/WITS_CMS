<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{

    private $class;

    public function __construct(Classes $class)
    {
        $this->class = $class;
    }
    public function addClassforadmin(Request $request)
    {
        $data = $request->all();
        $this->class->create([
            'class'  => $data['class'],
        ]);
        return redirect('/admin/class');
    }
    public function listClassforadmin()
    {

        $status = null;
        $message = null;
        $classes = $this->class->all();

        return view('admin.add-class', compact('status', 'message', 'classes'))->render();
    }
    public function deleteClass(Request $request, $id)
    {
        try {
            // Find the class by ID
            $class = Classes::findOrFail($id);
           
            // Delete the associated book details
            $class->books()->delete();
    
            // Delete the class itself
            $class->delete();
   
            return redirect()->back()->with('status', 'success')->with('message', 'Class and related books deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error')->with('message', 'Failed to delete class and related books');
        }
    }
    
  
}
