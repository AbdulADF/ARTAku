<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create_expense', [
            'categories' => category::all(),
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
        $validatedData = $request->validate([
            'User_id' => 'required',
            'category_id' => 'required',
            'token' => Str::random(40),
            'amount' => 'required|min:0',
            'description' => 'required',
            'date' => 'required',
        ]);

        expense::create($validatedData);
        return redirect('/pengeluaran')->with('success', 'Expense is successfully saved');
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
    public function edit(expense $expense)
    {
        return view('edit_expense',[
            'expense' => $expense,
            'categories' => category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, expense $expense)
    {
        $validatedData = $request->validate([
            'amount' => 'required|min:0',
            'description' => 'required',
            'category_id' => 'required',
            'date' => 'required',
        ]);

        expense::where('id', $expense->id)->update($validatedData);
        return redirect('/pengeluaran');
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
