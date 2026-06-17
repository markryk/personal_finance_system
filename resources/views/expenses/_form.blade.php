<?php $word = $expense->exists ? "Atualizar" : "Nova"; ?>
<h2> <?=$word;?> Despesa </h2>
<form action="{{ $expense->exists ? route('expenses.update', $expense->id) : route('expenses.store') }}" method="POST">
    @csrf
    @if($expense->exists)
        @method('PUT')
    @endif

    <x-input name="description" label="Descrição" value="{{ old('description', $expense->description ?? '') }}"/>
    <x-input name="amount" label="Valor" type="number" step="0.01" value="{{ old('amount', $expense->amount ?? '') }}"/>
    <x-input name="date" label="Data" type="date" value="{{ old('date', $expense->date?->format('Y-m-d') ?? '') }}"/>

    <x-select 
        name="category_id"
        label="Categoria"
        :options="$categories->pluck('name','id')->toArray()"
        :selected="isset($expense) ? $expense->category_id : null"
    />

    <button type="submit" class="btn btn-success">
        {{ $expense->exists ? 'Atualizar' : 'Salvar' }}
    </button>
</form>