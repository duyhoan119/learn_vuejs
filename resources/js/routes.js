import { createWebHistory, createRouter } from "vue-router";
import ProductList from "./components/Admin/Products/ListComponent.vue";
import Index from "./components/Client/Index.vue";
import Products from "./components/Client/Product/Products.vue";
import CategoryList from "./components/Admin/Categories/List.vue";
const routes = [
    {
        path: "/",
        component: Index,
        name: Index, 
    },
    {
        path: "/categories/:categoryId",
        component: Products,
    },
    {
        path: "/products",
        component: Products,
        name: Products,
    },
    {
        path: "/admin/product",
        component: ProductList,
        name: ProductList,
    },
    {
        path: "/admin/category",
        component: CategoryList,
        name: CategoryList,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
