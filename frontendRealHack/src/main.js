import Vue from 'vue'
import App from './App.vue'





import VueRouter from 'vue-router'
import Router from './routes.js';


Vue.use(VueRouter);




Vue.prototype.$baseUrl = 'http://localhost:8000/api';



new Vue({
  el: '#app',
  render: h => h(App),
  router: Router,


})
