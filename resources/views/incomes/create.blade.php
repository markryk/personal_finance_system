@extends('layouts.app')
@section('content')

<h2> Nova Receita </h2>

<form action="{{ route('incomes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label> Descrição </label>
        <input type="text" name="description" class="form-control">
    </div>

    <div class="mb-3">
        <label> Valor </label>
        <input type="number" step="0.01" name="amount" class="form-control">
    </div>

    <div class="mb-3">
        <label> Data </label>
        <input type="date" name="date" class="form-control">
    </div>

    <div class="mb-3">
        <label> Categoria </label>

        <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success"> Salvar </button>
</form>

@endsection