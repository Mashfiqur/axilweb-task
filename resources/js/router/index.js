import { createWebHistory, createRouter } from "vue-router";
import Login from '../views/auth/Login.vue';
import NotFound from "../views/NotFound.vue";
import AuthenticatedLayout from "../views/AuthenticatedLayout.vue";
import Dashboard from "../views/admin/Dashboard.vue";
import Courses from "../views/admin/Courses.vue";
import Coupons from "../views/admin/coupons/Coupons.vue";
import CreateCoupon from "../views/admin/coupons/CreateCoupon.vue";
import CouponAssign from "../views/admin/coupons/CouponAssign.vue";
import Departments from "../views/admin/Departments.vue";
import authStore from "../store/modules/auth"

import NProgress from 'nprogress'
import 'nprogress/nprogress.css'

const ROOT_URL = '';
const routes = [
    {
        name: 'login',
        path: ROOT_URL + '/',
        component: Login,
        meta: { forGuest: true }
    },
    {
        path: ROOT_URL + '/', name: 'Layout', component: AuthenticatedLayout,
        children: [
            {path: ROOT_URL + '/dashboard', name: 'Dashboard', component: Dashboard, meta: {RequireAuth: true}},
            {path: ROOT_URL + '/departments', name: 'Departments', component: Departments, meta: {RequireAuth: true}},
            {path: ROOT_URL + '/courses', name: 'Courses', component: Courses, meta: {RequireAuth: true}},
            {path: ROOT_URL + '/coupons', name: 'Coupons', component: Coupons, meta: {RequireAuth: true}},
            {path: ROOT_URL + '/coupons/create', name: 'CreateCoupon', component: CreateCoupon, meta: {RequireAuth: true}},
            {path: ROOT_URL + '/coupons/assign', name: 'CouponAssign', component: CouponAssign, meta: {RequireAuth: true}},
        ]
    },
    {
        path: "/:pathMatch(.*)*",
        name: "not-found",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    NProgress.start()
    if (to.matched.some(record => record.meta.RequireAuth) && authStore.state.authenticated == "false") {
        authStore.actions.logout()
    }
    return next()
})
router.afterEach(transition => {
    NProgress.done()
})
     


export default router;
