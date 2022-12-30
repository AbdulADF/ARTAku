<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IncomeListController;
use App\Http\Controllers\EditExpenseController;
use App\Http\Controllers\ExpenseListController;
use App\Http\Controllers\LoginLogoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});


Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    
    Route::get('/login', [LoginLogoutController::class, 'index'])->name('login');
    Route::post('/login', [LoginLogoutController::class, 'login']);
});


Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/home', [HomeController::class, 'index']);
    
    Route::get('/pemasukan', [IncomeListController::class, 'index']);
    Route::delete('/pemasukan/{income:id}', [IncomeListController::class, 'destroy']);
    Route::put('/pemasukan/{income:id}', [IncomeController::class, 'update']);
    Route::get('/pemasukan/{income:id}/edit', [IncomeController::class, 'edit']);
    
    Route::get('/pengeluaran', [ExpenseListController::class, 'index']);
    Route::delete('/pengeluaran/{expense:id}', [ExpenseListController::class, 'destroy']);
    Route::put('/pengeluaran/{expense:id}', [ExpenseController::class, 'update']);
    Route::get('/pengeluaran/{expense:id}/edit', [ExpenseController::class, 'edit']);

    Route::get('/budget', [BudgetController::class, 'index']);
    Route::post('/budget', [BudgetController::class, 'store']);
    
    Route::get('/create_income', [IncomeController::class, 'index']);
    Route::post('/create_income', [IncomeController::class, 'store']);
    
    Route::get('/create_expense', [ExpenseController::class, 'index']);
    Route::post('/create_expense', [ExpenseController::class, 'store']);

    Route::get('/logout', [LoginLogoutController::class, 'logout']);

});