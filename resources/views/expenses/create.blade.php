@extends('layouts.app')
@section('content')

    <h2> Nova Despesa </h2>

    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf

        <x-input name="description" label="Descrição"/>
        <x-input name="amount" label="Valor" type="number" step="0.01"/>
        <x-input name="date" label="Data" type="date"/>
        <x-select class="form-select" name="category_id" label="Categoria" :options="$categories->pluck('name','id')->toArray()"/>

        <button class="btn btn-danger"> Salvar Despesa </button>
    </form>

@endsection