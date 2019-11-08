import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter);
import test from './components/test.vue'
import Question from './components/Question.vue'
import register from './components/register.vue'
import login from './components/Login.vue'
import AddQuestion from './components/AddQuestion.vue'
import Answers from './components/AddQuestion.vue'

import home from './components/home.vue'


const router = new VueRouter({
  mode: 'history',

  scrollBehavior() {
    return { x: 0, y: 0 };
  },






  routes: [


    { path: "/test", component: test },
    { path: "/question", component: Question },
    { path: "/register", component: register },
    { path: "/login", component: login },
    { path: "/addQuestion", component: AddQuestion },
    { path: "/", component: home },

  ],


});
export default router;