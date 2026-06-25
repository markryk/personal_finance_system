<template>
    <div class="card">
        <div class="card-body">

            <h4> Nova meta </h4>

            <form @submit.prevent="save">
                <label for=""> Descrição</label>
                <input class="form-control mb-2" placeholder="Nome" v-model="form.name"/>

                <label for=""> Valor a atingir </label>
                <input class="form-control mb-2" type="number" step="0.01" min="0.00" placeholder="Valor" v-model="form.target_amount"/>

                <label for=""> Estimativa da meta </label>
                <input class="form-control mb-2" type="date" v-model="form.deadline"/>

                <button class="btn btn-primary"> Salvar </button>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { reactive } from 'vue';

    const emit = defineEmits(['created']);
    const form = reactive({ name:'', target_amount: 0, deadline:'' });

    async function save() {

        await fetch('/goals', {
            method:'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(form)
        });

        form.name = '';
        form.target_amount = 0;
        form.deadline = '';

        emit('created');
    }
</script>