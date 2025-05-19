import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import { createApp } from 'vue';
import App from './components/App.vue';


const app = createApp();

app.component('app', App);


app.mount('#app');