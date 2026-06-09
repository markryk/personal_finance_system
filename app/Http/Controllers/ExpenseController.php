<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //$expenses = Expense::with('category')->latest()->paginate(3);
        $expenses = Expense::with('category')->latest()->get();

        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::where('type', 'expense')->get();
        return view('expenses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        Expense::create($request->all());
        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense) {
        $categories = Category::where('type', 'expense')->get();

        return view('expenses.edit', compact('expense', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense) {
        $expense->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Despesa atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense) {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Despesa removida.');
    }
}