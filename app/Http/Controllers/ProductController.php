<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $expenses;

    public function __construct(Expenses $expenses)
    {
        $this->expenses = $expenses;
    }
    
    public function addNewProduct(Request $request)
    {
        
        try {
            $this->validate($request, [

                'name'    => 'required',
                'supplier_name'       => 'required',
                'description'        => 'required',
                'category_id'        => 'required',
                'subcategory_id'        => 'required',

            ]);
            $data = $request->all();
       
          $product= $this->products->AddProductDetail($data);
       
            return redirect()->back()->with('status', 'success')->with('message', 'product Added Succesfully');
        } catch (\Exception $e) {
          
            Log::error('[ProductController][addNewProduct]Validation error: ' . 'Request=' . $request);
            return redirect()->back()->with('status', 'error')->with('message', 'Products Not Added ');
        }
    }

    public function addproduct(Request $request)
    {
        $status = null;
        $message = null;
        

        return view('admin.addProduct', compact('status', 'message'));
    }

    public function listproductforadmin()
    {
        $status = null;
        $message = null;
        $prodctdetails = $this->productdetails->with('class')->get();

        //Pass book details to the view
        return view('admin.list-product', compact('productdetails'))->with([
        'chartData' => $this->getChartData($bookdetails),
        ]);
    }

    public function fetchProductListforAdmin()
    {
        $status = null;
        $message = null;
        //$schooldetails = $this->schooldetail->all();
        return view('admin.list-product', compact('status', 'message'));
    }

}
