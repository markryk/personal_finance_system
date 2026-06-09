@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <h2> Despesas </h2>
        <a href="{{ route('expenses.create') }}" class="btn btn-primary"> Nova Despesa </a>
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
            @foreach($expenses as $expense)
                <tr>
                    <td> {{ $expense->description }} </td>
                    <td> {{ $expense->category->name }} </td>
                    <td> R$ {{ number_format($expense->amount,2,',','.') }} </td>
                    <td> {{ date('d/m/Y', strtotime($expense->date)) }} </td>

                    <td>
                        <a href="{{ route('expenses.edit', $expense) }}" class="btn btn-warning btn-sm"> Editar </a>

                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST" class="d-inline">
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