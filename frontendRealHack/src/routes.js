import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter);
import test from './components/test.vue'
import Question from './components/Question.vue'





const router = new VueRouter({
  mode: 'history',

  scrollBehavior() {
    return { x: 0, y: 0 };
  },






  routes: [

    { path: "/", component: test },
    { path: "/test", component: test },
    { path: "/question", component: Question },


  ],


});
export default router;