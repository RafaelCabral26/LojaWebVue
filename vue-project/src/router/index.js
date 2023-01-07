import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
  
    {
      path: '/cadastro',
      name: 'cadastro',
      component: () => import('../views/UsuarioCadastro.vue')
    },
    {
      path: '/listar',
      name: 'listar',
      component: () => import ('../views/UserList.vue')
    },
    {
      path: '/enderecos',
      name: 'enderecos',
      component: () => import ('../views/AddressList.vue')
    },
    {
    path: '/login',
    name: 'login',
    component: () => import ('../views/UserLogin.vue')
  },
  {
    path: '/user',
    name: 'user',
    component: () =>import ('../views/UserInfo.vue')
  }
  ]
})

export default router
