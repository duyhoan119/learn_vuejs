<template>
    <Products></Products>
</template>
<script>
import Products from './Product/Products.vue';
export default {
    name: "Index",
    components() {
        Products;
    },
    data() {
    },
    components: { Products }
}
</script>