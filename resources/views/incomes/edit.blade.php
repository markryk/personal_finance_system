@extends('layouts.app')
@section('content')
    <h2> Editar Receita </h2>

    <form action="{{ route('incomes.update', $income) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label> Descrição </label>
            <input type="text" name="description" value="{{ $income->description }}" class="form-control">
        </div>

        <div class="mb-3">
            <label> Valor </label>
            <input type="number" step="0.01" name="amount" value="{{ $income->amount }}" class="form-control">
        </div>

        <div class="mb-3">
            <label> Data </label>
            <input type="date" name="date" value="{{ $income->date }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected($income->category_id == $category->id)> 
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success"> Atualizar </button>
    </form>
@endsection