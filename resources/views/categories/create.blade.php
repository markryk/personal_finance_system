@extends('layouts.app')
@section('content')

    <h2> Nova Categoria </h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label> Nome </label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label> Tipo </label>
            <select name="type" class="form-control">
                <option value="income"> Receita </option>
                <option value="expense"> Despesa </option>
            </select>
        </div>

        <div class="mb-3">
            <label> Cor </label>
            <input type="color" name="color" class="form-control form-control-color">
        </div>

        <button class="btn btn-success"> Salvar </button>
    </form>
@endsection