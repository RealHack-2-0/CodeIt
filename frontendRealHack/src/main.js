import Vue from 'vue'
import App from './App.vue'
import Vuex from 'vuex'



import VueRouter from 'vue-router'
import Router from './routes.js';


Vue.use(VueRouter);
Vue.use(Vuex)


new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
})
