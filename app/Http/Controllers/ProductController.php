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
  
    public function addproduct(Request $request)
    {
        $status = null;
        $message = null;
        

        return view('admin.add-product', compact('status', 'message'));
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
