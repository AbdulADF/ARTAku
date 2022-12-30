<?php

namespace App\Http\Controllers;

use App\Models\income;
use App\Models\category;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create_income');
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
            'User_id' => 'required',
            'amount' => 'required|min:0',
            'description' => 'required',
            'date' => 'required',
        ]);

        income::create($validatedData);
        return redirect('/pemasukan')->with('success', 'Income is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(income $income)
    {
        return view('edit_income',[
            'income' => $income,
            'categories' => category::all(),
        ]);
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
        $validatedData = $request->validate([
            'amount' => 'required|min:0',
            'description' => 'required',
            'date' => 'required',
        ]);

        income::where('id', $income->id)->update($validatedData);
        return redirect('/pemasukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(income $income)
    {
        //
    }
}
