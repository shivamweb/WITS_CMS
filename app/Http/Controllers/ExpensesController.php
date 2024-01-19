<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExpensesController extends Controller
{

    private $expenses;

    public function __construct(Expenses $expenses)
    {
        $this->expenses = $expenses;
    }
    public function addexpense(Request $request)
    {
        
        try {
            $this->validate($request, [

                'book_cost'    => 'required',
                'travelling_cost'       => 'required',
                'labour_cost' => 'required',
                'warehouse_cost'        => 'required',

            ]);
            $data = $request->all();
       
          $abc= $this->expenses->expenseData($data);
        //    dd($abc);
            return redirect()->back()->with('status', 'success')->with('message', 'Expenses Added Succesfully');
        } catch (\Exception $e) {
            dd($e);
            Log::error('[ExpensesController][addexpense]Validation error: ' . 'Request=' . $request);
            return redirect()->back()->with('status', 'error')->with('message', 'Expenses Not Added ');
        }
    }
    public function viewexpense(Request $request)
    {
        $status = null;
        $message = null;
        $expenses = $this->expenses->all();

        return view('admin.add-expense', compact('status', 'message', 'expenses'));
    }
    public function listexpenseforadmin()
    {

        $status = null;
        $message = null;
        $expenses = $this->expenses->all();

        return view('admin.add-expense', compact('status', 'message', 'expenses'))->render();
    }
    public function deleteExpense($id)
{
    // Find the expense by ID and delete it
    $expense = Expenses::find($id);
    if ($expense) {
        $expense->delete();
        return redirect()->back()->with('status', 'success')->with('message', 'Expense deleted successfully.');
    } else {
        return redirect()->back()->with('status', 'error')->with('message', 'Expense not found.');
    }
}

public function getexpensereport()
{
    $book_costcount = $this->expenses->sum('book_cost');
    $travelling_costcount = $this->expenses->sum('travelling_cost');
    $labour_costcount = $this->expenses->sum('labour_cost');
    $warehouse_costcount = $this->expenses->sum('warehouse_cost');

    $expensecount = [
        'book_costcount'      => $book_costcount,
        'travelling_costcount' => $travelling_costcount,
        'labour_costcount'     => $labour_costcount,
        'warehouse_costcount'  => $warehouse_costcount,
    ];

    return response()->json($expensecount);
}


}
