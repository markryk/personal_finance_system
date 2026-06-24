<template>
    <div>
        <h2> Metas Financeiras </h2>
        <goal-progress v-for="goal in goals" :key="goal.id" :goal="goal"/>
    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import GoalProgress from './GoalProgress.vue';

    const goals = ref([]);

    async function load() {
        let response = await fetch('/api/goals');
        goals.value = await response.json();
    }
    
    onMounted(load);
</script>