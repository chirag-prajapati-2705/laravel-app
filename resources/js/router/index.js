import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)

const Register = () => import('../components/Register.vue')
const DahboardLayout = () => import('../components/Layouts/Dashboard.vue')

const List = () => import('../components/List.vue')
const Detail = () => import('../components/detail.vue')
const Map = () => import('../components/map.vue')



const Routes = [
    {
        name:"register",
        path:"/register",
        component:Register,
    },
    
    {
      path: "/",
      name:"dashboard",
      component:DahboardLayout,
  },
  {
        name:"list",
        path:"/list",
        component:List,
  },
  {
    path: '/user/:user_id',
    name: 'user-detail',
    props: true,
    component: Detail,
  },
    {
    path: 'map',
    name: 'map',
    component: Map,
 }
]

var router  = new VueRouter({
    mode: 'history',
    routes: Routes
})

export default router