@extends('layouts.app')
@section('content')
    <h2> Editar Despesa </h2>

    <form action="{{ route('expenses.update', $expense) }}" method="POST">
        @csrf
        @method('PUT')

        <x-input name="description" label="Descrição" value="{{ $expense->description }}"/>
        <x-input name="amount" label="Valor" type="number" step="0.01" value="{{ $expense->amount }}"/>
        <x-input name="date" label="Data" type="date" value="{{ $expense->date->format('Y-m-d') }}"/>

        <x-select 
            name="category_id"
            label="Categoria"
            :options="$categories->pluck('name','id')->toArray()"
            :selected="$expense->category_id"
        />

        <button class="btn btn-success"> Atualizar </button>
    </form>
@endsection