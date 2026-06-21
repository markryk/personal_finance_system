<template>
    <div>
        <div class="mb-3">
            <button class="btn btn-outline-primary me-2" @click="today"> Hoje </button>
            <button class="btn btn-outline-primary me-2" @click="week"> Esta semana </button>
            <button class="btn btn-outline-primary me-2" @click="month"> Este mês </button>
            <button class="btn btn-outline-primary me-2" @click="lastMonth"> Mês anterior </button>
            <button class="btn btn-outline-primary" @click="year"> Este ano </button>
        </div>

        <div class="row">
            <div class="col-md-5">
                <label> Data inicial </label>
                <input type="date" class="form-control" v-model="start"/>
            </div>

            <div class="col-md-5">
                <label> Data final </label>
                <input type="date" class="form-control" v-model="end"/>
            </div>

            <div class="col md-2 mt-4">
                <button class="btn btn-success" @click="sendFilter"> Filtrar </button>
            </div>
        </div>
        <!--<div>
            <input type="date" v-model="start"/>
            <input type="date" v-model="end"/>

            <button @click="filter"> Filtrar </button>
        </div>-->
    </div>
</template>

<script setup>
    import {ref} from 'vue';

    const start = ref(''); //Guarda a data inicial
    const end = ref('');
    const emit = defineEmits(['filter']);

    function formatDate(date) {
        return date.toISOString().split('T')[0]
    }

    // HOJE
    function today() {
        let date = new Date();
        start.value = formatDate(date);
        end.value = formatDate(date);
        sendFilter();
    }

    // SEMANA
    function week() {
        let today = new Date();
        let first = new Date();
        first.setDate(today.getDate() - today.getDay());
        start.value = formatDate(first);
        end.value = formatDate(today);
        sendFilter();
    }

    // ESTE MÊS
    function month() {
        let date = new Date();
        let first = new Date(date.getFullYear(), date.getMonth(), 1);
        start.value = formatDate(first);
        end.value = formatDate(date);
        sendFilter();
    }

    // MÊS ANTERIOR
    function lastMonth() {
        let date = new Date();
        let first = new Date(date.getFullYear(), date.getMonth()-1, 1);
        let last = new Date(date.getFullYear(), date.getMonth(), 0);
        start.value = formatDate(first);
        end.value = formatDate(last);
        sendFilter();
    }

    // ANO
    function year() {
        let date = new Date();
        let first = new Date(date.getFullYear(), 0, 1);
        start.value = formatDate(first);
        end.value = formatDate(date);
        sendFilter();
    }

    function sendFilter() {
        emit('filter', {
            start: start.value, 
            end: end.value
        });
    }

    async function loadDashboard(filters) {

        let response = await fetch('/dashboard/data?' + new URLSearchParams(filters));
        let data = await response.json();

        income.value = data.income;
        expense.value = data.expense;
    }
</script>