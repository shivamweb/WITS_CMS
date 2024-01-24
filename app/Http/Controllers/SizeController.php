<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Size Model
     */
    private $size;

    public function __construct(
        Size $size
    ) {
        $this->size = $size;
    }

    public function addNewSize(Request $request)
    {

        $data = $request->all();
        $this->size->create([
            'size'  => $data['size'],
        ]);
        return redirect('/size');
    }

    public function viewSize(Request $request)
    {
        $status = null;
        $message = null;
        $suppliers = $this->size->all();

        return view('admin.add-size', compact('status', 'message', 'size'));
    }

    public function listSize()
    {
        $status = null;
        $message = null;
        $sizes = $this->size->all();

        return view('admin.add-size', compact('status', 'message', 'sizes'))->render();
    }
    public function deleteSize(Request $request, $id)
    {
        try {
            // Find the class by ID
            $size = size::findOrFail($id);

            // Delete the associated book details
            // $this->size->delete();

            // Delete the class itself
            $size->delete();

            return redirect()->back()->with('status', 'success')->with('message', 'Size and related sizes deleted successfully');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('status', 'error')->with('message', 'Failed to delete size and related books');
        }
    }
}
