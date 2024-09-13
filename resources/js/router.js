
import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    LinkactiveClass: 'active',
 routes: [
  {
   path: '/departament',
   name: 'Отделы',
   component: () => import('@/components/Departament.vue')
  },
     {
         path: '/directory',
         name: 'Справочник',
         component: () => import('@/components/Directory.vue')
     },
     {
         path: '/contacts',
         name: 'Контакты',
         component: () => import('@/components/Contacts.vue')
     },
     {
         path: '/auth',
         name: 'Авторизация',
         component: () => import('@/components/Auth.vue')
     },
     {
         path: '/',
         name: 'Люди',
         component: () => import('@/components/people/People.vue')
     },

 ]
})
export default router;
