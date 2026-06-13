import { createApp } from 'vue';
import DashboardChart from './components/DashboardChart.vue';
import ExpenseChart from './components/ExpenseChart.vue';
import MonthlyChart from './components/MonthlyChart.vue';
import GoalChart from './components/GoalChart.vue';

const app = createApp({});

app.component('dashboard-chart', DashboardChart);
app.component('expense-chart', ExpenseChart);
app.component('monthly-chart', MonthlyChart);
app.component('goal-chart', GoalChart);
app.mount('#app');