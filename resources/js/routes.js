import {createWebHistory , createRouter} from 'vue-router';
import Home from "./components/Admin/HomeComponent.vue";
import ProductList from "./components/Admin/Products/ListComponent.vue";

const routes = [
    {
        path: "/",
        component: Home,
        name: Home,
    },
    {
        path: "/products",
        component: ProductList,
        name: ProductList,
    },
];

const router = createRouter({
    history:createWebHistory(),
    routes
});

export default router;
