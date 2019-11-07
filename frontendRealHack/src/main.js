import Vue from 'vue'
import App from './App.vue'
import test from './components/test.vue'

import VueRouter from 'vue-router'
import Router from './routes.js';


Vue.use(VueRouter);


new Vue({
  el: '#app',
  render: h => h(App),
  router: Router
})
