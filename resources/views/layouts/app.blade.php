<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title> Sistema Financeiro </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="#"> Financeiro </a>

                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('categories.index') }}"> Categorias </a>
                    <a class="nav-link" href="{{ route('incomes.index') }}"> Receitas </a>
                    <a class="nav-link" href="{{ route('expenses.index') }}"> Despesas </a>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success"> {{ session('success') }} </div>
            @endif

            @yield('content')
        </div>
        
    </body>
</html>