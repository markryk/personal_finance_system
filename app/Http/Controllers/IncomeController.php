<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $incomes = Income::with('category')->latest()->get();
        //$incomes = Income::with('category')->latest()->paginate(3);

        return view('incomes.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::where('type', 'income')->get();
        return view('incomes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $query = Income::query();

        if ($request->start_date) {
            $query->whereDate('date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('date', '<=', $request->end_date);
        }

        $incomes = $query->get();

        Income::create($request->all());

        return redirect()->route('incomes.index')->with('success', 'Receita cadastrada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income) {
        $categories = Category::where('type', 'income')->get();

        return view('incomes.edit', compact('income', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income) {

        $income->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Receita atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income) {
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Receita removida.');
    }
}