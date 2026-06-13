@extends('layouts.app')
@section('content')
    <h2> Editar Receita </h2>

    <form action="{{ route('incomes.update', $income) }}" method="POST">
        @csrf
        @method('PUT')

        <x-input name="description" label="Descrição" value="{{ $income->description }}"/>
        <x-input name="amount" label="Valor" type="number" step="0.01" value="{{ $income->amount }}"/>
        <x-input name="date" label="Data" type="date" value="{{ $income->date->format('Y-m-d') }}"/>

        <x-select 
            name="category_id"
            label="Categoria"
            :options="$categories->pluck('name','id')->toArray()"
            :selected="$income->category_id"
        />

        <button class="btn btn-success"> Atualizar </button>
    </form>
@endsection