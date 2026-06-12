@extends('layouts.app')
@section('content')

    <h2 class="mb-4"> Dashboard Financeiro </h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-body">                        
                    <h5> Receitas </h5>
                    <h2 class="text-success"> R$ {{ number_format($totalIncome, 2, ',', '.') }} </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-danger">
                <div class="card-body">
                    <h5> Despesas </h5>
                    <h2 class="text-danger"> R$ {{ number_format($totalExpense, 2, ',', '.') }} </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h5> Saldo Atual </h5>
                    <h2 class="text-primary"> R$ {{ number_format($balance, 2, ',', '.') }} </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header"> Receitas x Despesas </div>

                <div class="card-body">
                    <canvas id="financeChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header"> Despesas por Categoria </div>

                <div class="card-body">
                    <canvas id="expenseCategoryChart"> </canvas>
                </div>
            </div>
        </div>

        <!--<div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header"> </div>

                <div class="card-body">
                    <canvas id=""> </canvas>
                </div>
            </div>
        </div>-->

        <!--<div id="app">
            <dashboard-chart
                :labels='@json(["Receitas", "Despesas"])'
                :values='@json([$totalIncome, $totalExpense])'>
            </dashboard-chart>
        </div>-->
    <!--</div>-->

    @push('scripts')
        <script>
            const ctx = document.getElementById('financeChart');

            new Chart(ctx, {
                type: 'bar',

                data: {
                    labels: ['Receitas', 'Despesas'],

                    datasets: [{
                        label: 'Valores',
                        data: [
                            {{ $totalIncome }},
                            {{ $totalExpense }}
                        ]
                    }]
                }
            });
        </script>

        <script>
            const categoryLabels = @json($expensesByCategory->pluck('name'));
            const categoryValues = @json($expensesByCategory->pluck('total'));

            new Chart(document.getElementById('expenseCategoryChart'), {
                    type: 'pie',
                    data: {
                        labels: categoryLabels,

                        datasets: [{
                            data: categoryValues
                        }]
                    }
                }
            );
        </script>
    @endpush
@endsection