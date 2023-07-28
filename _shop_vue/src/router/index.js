import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'some',
      component: () => import('../views/Some.vue')
    },
      {
          path: '/other',
          name: 'other',
          component: () => import('../views/Other.vue')
      }
  ]
})

export default router
