<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{

    private $suppliers;

    public function __construct(Supplier $supplier)
    {
        $this->suppliers = $supplier;
    }
  
    public function addsupplier(Request $request)
    {
        
        try {
            $this->validate($request, [

                'name'    => 'required',
                'contact_number'       => 'required',
                
                'address'        => 'required',

            ]);
            $data = $request->all();
       
          $supplier= $this->suppliers->AddSupplierDetail($data);
       
            return redirect()->back()->with('status', 'success')->with('message', 'supplier Added Succesfully');
        } catch (\Exception $e) {
          
            Log::error('[SupplierController][addsupplier]Validation error: ' . 'Request=' . $request);
            return redirect()->back()->with('status', 'error')->with('message', 'Expenses Not Added ');
        }
    }
    public function viewSupplier(Request $request)
    {
        $status = null;
        $message = null;
        $suppliers = $this->suppliers->all();

        return view('admin.add-supplier', compact('status', 'message', 'suppliers'));
    }

    public function listsupplierforadmin()
    {

        $status = null;
        $message = null;
        $suppliers = $this->suppliers->all();

        return view('admin.add-supplier', compact('status', 'message', 'suppliers'))->render();
    }

    public function deleteSupplier(Request $request, $id)
    {
        try {
            // Find the class by ID
            $supplier = supplier::findOrFail($id);

            // Delete the associated book details
            $this->supplier->delete();

            // Delete the class itself
            $supplier->delete();

            return redirect()->back()->with('status', 'success')->with('message', 'Spplier and related Suppliers deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error')->with('message', 'Failed to delete Supplier and related Suppliers');
        }
    }
}

