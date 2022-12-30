<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\income;
use App\Models\expense;
use Illuminate\Http\Request;

class IncomeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = income::latest()->where('User_id', auth()->user()->id)->get();
        $incomeTotal = income::latest()->where('User_id', auth()->user()->id)
        ->where('date', '>=', Carbon::now()->subDays(Carbon::now()->day))->sum('amount');
        $expenseTotal = expense::latest()->where('User_id', auth()->user()->id)
        ->where('date', '>=', Carbon::now()->subDays(Carbon::now()->day))->sum('amount');
        $User =  auth()->user();

        $remaining = $incomeTotal*(100 - $User->budgeting_plan->saved_percentage)/100 - $expenseTotal;
        if($remaining < 0 )
        {
            $remaining = 0;
        }


        $totalRemaining = $incomeTotal - $expenseTotal;
        if($totalRemaining < 0 )
        {
            $totalRemaining = 0;
        }

        return view('pemasukan', [
            'incomes' => $income,
            'remaining' => $remaining,
            'totalRemaining' => $totalRemaining,
            'User' => $User,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "test";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(income $income)
    {
        return "yesshow";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(income $income)
    {
        income::destroy($income->id);
        return redirect('/pemasukan');
    }
}
