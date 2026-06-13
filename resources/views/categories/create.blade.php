@extends('layouts.app')
@section('content')

    <h2> Nova Categoria </h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <x-input name="name" label="Nome" class="form-control"/>
        <x-select name="type" label="Tipo" :options="['income'=>'Receita', 'expense'=>'Despesa']"/>
        <x-input type="color" name="color" label="Cor" class="form-control-color"/>

        <button class="btn btn-success"> Salvar </button>
    </form>
@endsection