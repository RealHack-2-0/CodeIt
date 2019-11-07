import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        user: null,

    },

    getters: {
        user: state => {
            if (state.user) {
                return state.user
            } else {
                state.user = null
                return false;
            }


        },


    },


    mutations: {


        setUser(state, payload) {
            state.user = payload;
        },

    },

    actions: {

        setUser(context, payload) {
            context.commit('setUser', payload)
        },

    },
});