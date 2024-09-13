
import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    LinkactiveClass: 'active',
 routes: [
     {
         path: '/',
         name: 'Главная',
         component: () => import('@/components/Home.vue')
     },
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

 ]
})
export default router;
