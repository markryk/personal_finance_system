<?php $word = isset($category) ? "Atualizar" : "Nova"; ?>
<h2> <?=$word;?> categoria </h2>
<form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
    @csrf
    @if(isset($category))
        @method('PUT')
    @endif

    <x-input name="name" label="Nome" class="form-control" value="{{ old('name', $category->name ?? '') }}"/>

    <x-select 
        name="type" 
        label="Tipo" 
        :options="['income'=>'Receita', 'expense'=>'Despesa']" 
        :selected="isset($category) ? $category->type : null" 
    />

    <x-input type="color" name="color" label="Cor" class="form-control-color" value="{{ old('color', $category->color ?? '') }}"/>

    <button type="submit" class="btn btn-success">
        {{ isset($category) ? 'Atualizar' : 'Salvar' }}
    </button>
</form>