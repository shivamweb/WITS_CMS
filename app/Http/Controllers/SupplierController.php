<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{

    private $expenses;

    public function __construct(Expenses $expenses)
    {
        $this->expenses = $expenses;
    }
  
    public function addsupplier(Request $request)
    {
        $status = null;
        $message = null;
        

        return view('admin.add-supplier', compact('status', 'message'));
    }

}

