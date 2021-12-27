<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function index()
    {

        $expenses = Expense::orderBy('id','desc')->get();

    return $this->RespondWithSuccess('All expence view  successful',  $expenses , 200);

    }


    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'name' => 'required | min:3',
          'amount' => 'required'
        ];

        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $date = Carbon::now();

        $expense = new Expense();
        $expense->name = $request->input('name');
        $expense->amount = $request->input('amount');
        $expense->month = $date->format('F');
        $expense->year = $date->format('Y');
        $expense->date = $date->format('Y-m-d');
        $expense->save();

        return $this->RespondWithSuccess(
            'Expense added successfully',
            $expense,
            200
        );


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data = Expense::find($id);
        return $this->RespondWithSuccess('expense edit successful', $data, 200);
    }




    public function update(Request $request, $id)

    {

        try {
            $date = Carbon::now();

            $expense =  Expense::find($id);
            $expense->name = $request->input('name');
            $expense->amount = $request->input('amount');
            $expense->month = $date->format('F');
            $expense->year = $date->format('Y');
            $expense->date = $date->format('Y-m-d');
            $expense->save();

            return $this->RespondWithSuccess('Expense update successful', $expense, 200);
        } catch (Exception $e) {
            return $this->RespondWithEorror('Expense update not successful  ', $e->getMessage(), 400);
        }

    }


    public function destroy($id)
    {

        Expense::destroy($id);
        return response()->json([
            'success' => true,
            'message' => ' Expense Deleted Successful'
        ]);
    }

    public function today_expence()
    {
        // $today = Carbon::now();
         $today = date('Y-m-d');
        //  $today = new \DateTime();

        $expense = Expense::where('date', $today)->get();


        if ( (!$expense->isEmpty()))
        {
            return $this->RespondWithSuccess(

                'Today Expense purchage view successful',
                $expense,
                200
            );
        } else {
            return $this->RespondWithEorror(

                'no data found today',
                $expense,
                400
            );
        }

    }

    public function monthly_expense($month = null)
    {
        // dd($month);
        if ($month == null)
        {
            $month = date('F');
        }
        $expenses = Expense::where("month", $month)->get();
        if ( (!$expenses->isEmpty()))
        {
            return $this->RespondWithSuccess(

                'monthly Expense purchage view successful',
                $expenses,
                200
            );
        } else {
            return $this->RespondWithEorror(

                'no data found in this month',
                $expenses,
                400
            );
        }

    }

    public function yearly_expense($year = null)
    {
        if ($year == null)
        {
            $year = date('Y');
        }
        $expenses = Expense::latest()->where('year', $year)->get();
        $years = Expense::select('year')->distinct()->take(12)->get();
        if ( (!$expenses->isEmpty()))
        {
            return $this->RespondWithSuccess(

                'yearly Expense purchage view successful',
                $expenses,
                200
            );
        } else {
            return $this->RespondWithEorror(

                'no data found in this year',
                $expenses,
                400
            );
        }

    }


}
