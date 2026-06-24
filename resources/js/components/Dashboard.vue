<template>
    <dashboard-filter @filter="loadData"/>

    <h3> Receitas: {{income}} </h3>
    <h3> Despesas: {{expense}} </h3>
    <h3> Saldo: {{balance}} </h3>

    <finance-bar-chart :income="income" :expense="expense"/>
    <expense-pie-chart :labels="categories.labels" :values="categories.values"/>
    <monthly-chart :labels="monthly.labels" :values="monthly.values"/>

    <!--<div>
        <div class="mb-4">
            <dashboard-filter @filter="loadData"/>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5> Receitas </h5>
                        <h3> R$ {{ income }} </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5> Despesas </h5>
                        <h3> R$ {{ expense }} </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5> Saldo </h5>
                        <h3> R$ {{ balance }} </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</template>

<script setup>
    import { ref } from 'vue';
    import DashboardFilter from './DashboardFilter.vue';
    import FinanceBarChart from "./FinanceBarChart.vue";
    import ExpensePieChart from "./ExpensePieChart.vue";
    import MonthlyChart from "./MonthlyChart.vue";

    const income = ref(0);
    const expense = ref(0);
    const balance = ref(0);

    const categories = ref({labels:[], values:[]});
    const monthly = ref({labels:[], values:[]});

    const today = new Date();
    const start = today.toISOString().split('T')[0];
    const end = start;

    async function loadData(filters) {
        let response = await fetch('/dashboard/data?' + new URLSearchParams(filters));
        let data = await response.json();

        income.value = data.income;
        expense.value = data.expense;
        balance.value = data.balance;

        categories.value = data.categories;
        monthly.value = data.monthly;
    }

    //Ao iniciar, dashboard já mostra o dia atual
    loadData({start, end});
</script>