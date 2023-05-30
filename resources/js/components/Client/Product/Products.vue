<template>
    <div class="grid grid-cols-12 static">
        <div v-for="product in products" class="col-span-3 m-2" v-on:click="showDetail(product)">
            <div>
                <img class="m-auto rounded-lg"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtQS_d3gMR57P5sb5ZOynkromQ8dT15469EQ&usqp=CAU"
                    alt="">
            </div>
            <div class="text-center">
                <span>{{ product.price }}</span>
                <h3>{{ product.name }}</h3>
                <button type="button"
                    class="bg-red-600 text-black font-bold rounded-full px-2 py-1 text-xs hover:text-xl">Add to
                    cart</button>
            </div>
        </div>
        <DetailModal v-bind:productDetail="productDetail" v-show="isDetailModalVisible" @close="close"></DetailModal>
    </div>
</template>
<script>
import axios from 'axios';
import DetailModal from './DetailModal.vue';
export default {
    name: "Products",
    components() {
        DetailModal;
    },
    data() {
        return {
            products: [],
            productDetail: {},
            isDetailModalVisible: false
        };
    },
    created() {
        axios.get("http://127.0.0.1:8000/api/product").then(res => {
            console.log(res.data);
            this.products = res.data;
        });
    },
    methods: {
        close() {
            this.isDetailModalVisible = false;
        },
        showDetail(product) {
            this.productDetail = product;
            this.isDetailModalVisible = true;
        }
    },
    components: { DetailModal }
}
</script>