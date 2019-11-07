import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

export default new VueRouter({

  mode: 'history',

  routes: [{
      name: 'Home',
      path: '/',
      component: require('./components/Home.vue')
    },
    {
      path: '*',
      redirect: '/'
    }
  ]
})