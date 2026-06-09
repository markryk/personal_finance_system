@extends('layouts.app')
@section('content')
    <h2> Editar Categoria </h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label> Nome </label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>

        <div class="mb-3">
            <label> Tipo </label>
            <select name="type" class="form-control">
                <option value="income" @selected($category->type == 'income')> Receita </option>
                <option value="expense" @selected($category->type == 'expense')> Despesa </option>
            </select>
        </div>

        <div class="mb-3">
            <label> Cor </label>
            <input type="color" name="color" class="form-control form-control-color" value="{{ $category->color }}">
        </div>

        <button class="btn btn-success"> Atualizar </button>
    </form>
@endsection