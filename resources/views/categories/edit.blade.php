@extends('layouts.app')
@section('content')
    <h2> Editar Categoria </h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <x-input name="name" label="Nome" class="form-control" value="{{ $category->name }}"/>

        <x-select 
            name="type"
            label="Tipo"
            :options="['income'=>'Receita', 'expense'=>'Despesa']"
            :selected="$category->type"
        />

        <x-input type="color" name="color" label="Cor" class="form-control-color" value="{{ $category->color }}"/>

        <button class="btn btn-success"> Atualizar </button>
    </form>
@endsection