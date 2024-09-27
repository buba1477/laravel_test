
import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    LinkactiveClass: 'active',
 routes: [
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
     {
         path: '/create',
         name: 'Создать',
         component: () => import('@/components/people/CreatePeople.vue')
     },
     {
         path: '/edit/:id',
         name: 'Изменить',
         component: () => import('@/components/people/EditPeople.vue')
     },

 ]
})
export default router;
