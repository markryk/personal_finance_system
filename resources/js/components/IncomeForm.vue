<template>
    <form @submit.prevent="save">
        <input v-model="description" placeholder="Descrição"/>
        <input v-model="amount" type="number" placeholder="Valor"/>

        <select v-model="goal_id">
            <option value=""> Sem meta </option>
            <option v-for="goal in goals" :value="goal.id"> {{ goal.name }} </option>
        </select>

        <button> Salvar </button>
    </form>
</template>

<script setup>
    import { ref, onMounted } from 'vue';

    const description = ref('');
    const amount = ref(0);
    const goal_id = ref(null);
    const goals = ref([]);

    async function loadGoals() {
        let response = await fetch('/api/goals');
        goals.value = await response.json();
    }

    async function save() {

        await fetch('/incomes', {

            method: 'POST',
            headers: { 'Content-Type': 'application/json'},

            body:JSON.stringify({
                description: description.value,
                amount: amount.value,
                goal_id: goal_id.value
            })

        });
    }
    onMounted(loadGoals);
</script>