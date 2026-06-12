import { createApp } from 'vue';
import DashboardChart from './components/DashboardChart.vue';

const app = createApp({});

app.component('dashboard-chart', DashboardChart);
app.mount('#app');