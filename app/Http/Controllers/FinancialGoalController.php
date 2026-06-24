<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialGoal;

class FinancialGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $goals = FinancialGoal::all();
        return view('goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'target_amount'=>'required',
            'deadline'=>'required'
        ]);

        FinancialGoal::create([
            'name'=>$request->name,
            'target_amount'=>$request->target_amount,
            'deadline'=>$request->deadline
        ]);

        return response()->json(['success'=>true]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinancialGoal $goal) {
        $goal->update($request->all());
        return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialGoal $goal) {
        $goal->delete();
        return response()->json(['success'=>true]);
    }
}
