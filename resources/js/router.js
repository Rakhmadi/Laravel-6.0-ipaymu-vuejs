import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import foo from './components/foo.vue'
import f from './components/ExampleComponent.vue'
import j from './components/j.vue'
export default new Router({

  routes: [
      
    {
      path: '/',
      name: 'HelloWorld',
      component: f,
    },
    {
        path:'/init',
        name:'null',
        component:foo,
    },
    {
      path:'/s',
      name:'j',
      component:j
    }
  ]
})
