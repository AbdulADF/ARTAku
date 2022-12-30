<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\income;
use App\Models\expense;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseTotal = expense::latest()->where('User_id', auth()->user()->id)
        ->where('date', '>=', Carbon::now()->subDays(Carbon::now()->day))->sum('amount');
        $incomeTotal = income::latest()->where('User_id', auth()->user()->id)
        ->where('date', '>=', Carbon::now()->subDays(Carbon::now()->day))->sum('amount');
        $savedPercentage = auth()->user()->budgeting_plan->saved_percentage;

        if ($incomeTotal == 0) {
            $usedPercentage = 100;
        } else {
            $usedPercentage = $expenseTotal / ($incomeTotal*(100 - $savedPercentage)/10000);
        }
        
        return view('home' , [

            'expenses' => expense::latest()->where('User_id', auth()->user()->id)->take(4)->get(),
            'expenseTotal' => $expenseTotal,
            'incomeTotal' => $incomeTotal,
            'User' => auth()->user(),


            'usedPercentage' => $usedPercentage,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
