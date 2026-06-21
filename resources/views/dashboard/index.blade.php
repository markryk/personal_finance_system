@extends('layouts.app')
@section('content')
    <div id="app">
        <h2> Dashboard Financeiro </h2>

        <div class="mb-4">
            <dashboard></dashboard>
        </div>
        
        <dashboard-filter @filter="loadDashboard"/>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">                    
                        <finance-bar-chart :income="{{ $totalIncome }}" :expense="{{ $totalExpense }}"/>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <expense-pie-chart :labels='@json($categoryLabels)' :values='@json($categoryValues)'/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection