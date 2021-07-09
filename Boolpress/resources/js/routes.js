import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import Contatti from './pages/Contatti.vue';
import PostDet from './pages/PostDet.vue';
import Error404 from './pages/Error404.vue';

//creiamo la classe route con la stessa sintassi della creazione di #app

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/contatti',
            name: 'contatti',
            component: Contatti
        },
        {
            path: '/postdet/:slug', //con i due punti si aspetta un parametro che passo nel Card.vue con 'params:{slug}'
            name: 'postdet',
            component: PostDet
        },
        {
            path: '/*',
            name:'error',
            component: Error404
        },
    ]
});

export default router; //importante per espertore la const router 