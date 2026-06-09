@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-between">
        <h2> Receitas </h2>

        <a href="{{ route('incomes.create') }}" class="btn btn-primary"> Nova Receita </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th> Descrição </th>
                <th> Categoria </th>
                <th> Valor </th>
                <th> Data </th>
                <th width="180"> Ações </th>
            </tr>
        </thead>

        <tbody>
            @foreach($incomes as $income)
                <tr>
                    <td> {{ $income->description }} </td>
                    <td> {{ $income->category->name }} </td>
                    <td> R$ {{ number_format($income->amount,2,',','.') }} </td>
                    <td> {{ date('d/m/Y', strtotime($income->date)) }} </td>

                    <td>
                        <a href="{{ route('incomes.edit', $income) }}" class="btn btn-warning btn-sm"> Editar </a>

                        <form action="{{ route('incomes.destroy', $income) }}" method="POST" class="d-inline">
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