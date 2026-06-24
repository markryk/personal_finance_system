import { createApp } from 'vue';
import FinanceBarChart from './components/FinanceBarChart.vue';
import ExpensePieChart from './components/ExpensePieChart.vue';
import Goals from './components/Goals.vue';
import Dashboard from './components/Dashboard.vue';
//import DashboardFilter from './components/DashboardFilter.vue';
/*import DashboardChart from './components/DashboardChart.vue';
import ExpenseChart from './components/ExpenseChart.vue';
import MonthlyChart from './components/MonthlyChart.vue';
import GoalChart from './components/GoalChart.vue';*/

const app = createApp({});
app.component('finance-bar-chart', FinanceBarChart);
app.component('expense-pie-chart', ExpensePieChart);
app.component('goals', Goals);
app.component('dashboard', Dashboard);
//app.component('dashboard-filter', DashboardFilter);
/*app.component('dashboard-chart', DashboardChart);
app.component('expense-chart', ExpenseChart);
app.component('monthly-chart', MonthlyChart);
app.component('goal-chart', GoalChart);*/
app.mount('#app');