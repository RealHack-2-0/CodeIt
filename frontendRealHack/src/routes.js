import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter);
import test from './components/test.vue'
import register from './components/register.vue'
import login from './components/login.vue'





const router = new VueRouter({
  mode: 'history',

  scrollBehavior() {
    return { x: 0, y: 0 };
  },






  routes: [


    { path: "/test", component: test },
    { path: "/register", component: register },
    { path: "/login", component: login },


  ],


});
export default router;