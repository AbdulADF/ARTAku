<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\budgeting_plan;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('budget');
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
    
        $validatedData = $request->validate([
            'budgeting_plan_id' => 'required',
        ]);

        DB::table('users')->where('id', auth()->user()->id)->update(['budgeting_plan_id' => $validatedData['budgeting_plan_id']]);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\budgeting_plan  $budgeting_plan
     * @return \Illuminate\Http\Response
     */
    public function show(budgeting_plan $budgeting_plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\budgeting_plan  $budgeting_plan
     * @return \Illuminate\Http\Response
     */
    public function edit(budgeting_plan $budgeting_plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\budgeting_plan  $budgeting_plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, budgeting_plan $budgeting_plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\budgeting_plan  $budgeting_plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(budgeting_plan $budgeting_plan)
    {
        //
    }
}
