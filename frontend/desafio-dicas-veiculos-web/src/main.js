import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import "./plugins/axios";
import Vuex, { mapState } from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        // user: sessionStorage.getItem('user'),
        token: sessionStorage.getItem('token')
    },

    mutations: {
        logout(state) {
            // state.user = null;
            state.token = null;
        },

        login(state, { user, token }) {
            // state.user = user;
            console.log(user);
            state.token = token;
        }
    }
});

Vue.mixin({
    computed: {
        ...mapState({
            //  user: "user",
            token: "token"
        })
    }
});

Vue.config.productionTip = false

new Vue({
    router,
    store,
    vuetify,
    render: h => h(App)
}).$mount('#app')