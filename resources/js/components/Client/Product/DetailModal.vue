<template>
    <div class="z-10 mx-20 my-11 w-4/5 h-4/5 bg-slate-300 rounded-lg bg-opacity-95 absolute grid grid-cols-6">
        <div class="p-1 col-span-4 grid grid-cols-7 content-center overflow-auto">
            <div class="col-span-5">
                <img id="show" class="m-auto w-full h-full rounded-lg"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtQS_d3gMR57P5sb5ZOynkromQ8dT15469EQ&usqp=CAU"
                    alt="">
            </div>
            <div class="col-span-2 overflow-y-auto">

                <img v-for="image in images" v-on:click="convertImage(image.href)" class="m-1 rounded-lg h-1/4 hover:h-1/3"
                    :src="image.href" alt="">

            </div>

        </div>
        <div class="col-span-2 bg-slate-50 m-1 rounded-lg">
            <div>
                <h1>{{ productDetail.name }}</h1>
                <div v-show="isProductVariant">

                </div>
            </div>
            <div>
                <button type="button" class="bg-red-600 text-black font-bold rounded-full px-2 py-1 text-xs mx-2">Add to
                    cart</button>
                <button v-on:click="close"
                    class="bg-orange-400 text-black rounded-full text-xs font-bold px-2 py-1 mx-2">close</button>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: "detailModal",
    props: {
        productDetail: Object
    },
    data() {
        return {
            images: [],
            ProductVariant: [],
            isProductVariant: false
        }
    },
    mounted() {
        var uri = "api/product/1/images";
        var uriProductVariant = "api/product/1/variant";
        axios.get(uri).then(res => {
            this.images = res.data
            axios.get(uriProductVariant).then(res => {
                this.ProductVariant = res.data
            })
        })
    },
    methods: {
        close() {
            this.$emit('close')
        },
        convertImage(href) {
            document.getElementById("show").src = href;
        }
    }
}
</script>