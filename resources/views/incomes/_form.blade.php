<?php $word = $income->exists ? "Editar" : "Nova"; ?>
<h2> <?=$word;?> Receita </h2>
<form action="{{ $income->exists ? route('incomes.update', $income->id) : route('incomes.store') }}" method="POST">
    @csrf
    @if($income->exists)
        @method('PUT')
    @endif

    <x-input name="description" label="Descrição" value="{{ old('description', $income->description ?? '') }}"/>
    <x-input name="amount" label="Valor" type="number" step="0.01" value="{{ old('amount', $income->amount ?? '') }}"/>
    <x-input name="date" label="Data" type="date" value="{{ old('date', $income->date?->format('Y-m-d') ?? '') }}"/>

    <x-select 
        name="category_id"
        label="Categoria"
        :options="$categories->pluck('name','id')->toArray()"
        :selected="isset($income) ? $income->category_id : null"
    />

    <button type="submit" class="btn btn-success">
        {{ $income->exists ? 'Atualizar' : 'Salvar' }}
    </button>
</form>