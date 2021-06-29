import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'home',
        component: () =>
            import ( /* webpackChunkName: "dicas" */ '../views/Dicas.vue')
    },
    {
        path: '/cadastro',
        name: 'cadastro',
        component: () =>
            import ( /* webpackChunkName: "Cadastro" */ '../views/TipRegister.vue')
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
