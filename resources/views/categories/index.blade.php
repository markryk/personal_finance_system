@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2> Categorias </h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary"> Nova Categoria </a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th> Nome </th>
            <th> Tipo </th>
            <th> Cor </th>
            <th width="180"> Ações </th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)

        <tr>
            <td> {{ $category->name }} </td>
            <td> {{ $category->type }} </td>

            <td>
                <span style="width:20px; height:20px; display:inline-block; background:{{ $category->color }};"></span>
            </td>

            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm"> Editar </a>

                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Deseja realmente excluir?')" class="btn btn-danger btn-sm"> Excluir </button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection