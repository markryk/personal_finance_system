<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardApiController;
use App\Http\Controllers\FinancialGoalController;
use App\Http\Controllers\GoalApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/data', [DashboardApiController::class,'data'])->name('dashboard.data');

Route::resource('categories', CategoryController::class);
Route::resource('incomes', IncomeController::class);
Route::resource('expenses', ExpenseController::class);

Route::resource('goals', FinancialGoalController::class);
Route::get('/api/goals', [GoalApiController::class, 'index']);