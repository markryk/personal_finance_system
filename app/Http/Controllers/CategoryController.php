<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::latest()->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        /*$categories = Category::latest()->get();

        return view('categories.index', compact('categories'));*/
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        
        Category::create($request->all());
        
        /*Category::create([
            'name' => $request->name,
            'type' => $request->type,
            'color' => $request->color,
        ]);*/

        return redirect()->route('categories.index')->with('success', 'Categoria cadastrada.');
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
    public function edit(Category $category) {
        //$categories = Category::latest()->get();
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category) {
        $category->update([
            'name' => $request->name,
            'type' => $request->type,
            'color' => $request->color,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria removida.');
    }
}
