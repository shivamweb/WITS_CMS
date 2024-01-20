<?php

namespace App\Http\Controllers;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderClothController extends Controller
{
    private $expenses;

    public function __construct(Expenses $expenses)
    {
        $this->expenses = $expenses;
    }

    public function addorder(Request $request)
    {
        $status = null;
        $message = null;


        return view('admin.add-order', compact('status', 'message'));
    }
}
