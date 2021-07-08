window.Vue = require('vue');

//importo il mio app.vue
import App from './App.vue';
import router from './routes';

const app = new Vue({
    el: '#app',
    router,
    render: h =>  h(App) //ignettami App.vue dentro la mia app attraverso il suo export default
});

