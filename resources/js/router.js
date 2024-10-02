
import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    LinkactiveClass: 'active',
 routes: [
     {
         path: '/login',
         name: 'Логин',
         component: () => import('@/components/people/Login.vue')
     },
     {
         path: '/register',
         name: 'Регистрация',
         component: () => import('@/components/people/Register.vue')
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
     {
         path: '/oauth',
         name: 'oauth',
         component: () => import('@/components/people/Oauth.vue')
     },

 ]
})
// router.beforeEach((to, from, next) => {
//     if (!localStorage.getItem('x_xsrf_token')) {
//         if (to.name === 'Логин' || to.name === 'Регистрация') {
//             return next();
//         } else {
//            return  next({name: 'Логин'});
//         }
//     }
//     if(to.name === 'Логин' || to.name === 'Регистрация' && localStorage.getItem('x_xsrf_token')) {
//         return next({name: 'Люди'});
//     }
//
//     next();
// })
export default router;
