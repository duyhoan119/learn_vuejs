<template>
    <div class="w-full max-w-xs">
        <h2 class="text-center font-bold">
            Add new product
        </h2>
        <form action="">
            <div class="my-2">
                <label for="name">Name :</label>
                <input id="name" type="text" v-model="name" class=" rounded-full px-2 py-1 mx-2 bg-gray-200">
            </div>
            <div class="my-2">
                <label for="meta_title">Meta title :</label>
                <input id="meta_title" type="text" v-model="meta_title" class="rounded-full px-2 py-1 mx-2 bg-gray-200">
            </div>
            <div class="my-2">
                <label for="slug">Slug :</label>
                <input id="slug" type="text" v-model="slug" class="rounded-full px-2 py-1 mx-2 bg-gray-200">
            </div>
            <div class="my-2">
                <label for="price">Price :</label>
                <input id="price" type="number" v-model="price" class="rounded-full px-2 py-1 mx-2 bg-gray-200">
            </div>
            <div class="my-2">
                <label for="discount">Discount :</label>
                <input id="discount" type="number" v-model="discount" class="rounded-full px-2 py-1 mx-2 bg-gray-200">
            </div>
            <div class="my-2">
                <label for="type">Type :</label>
                <input value="0" type="radio" id="type" v-model="discount" class="rounded-full px-2 py-1 mx-2 bg-gray-200">
                <input value="1" type="radio" id="type" v-model="discount" class="rounded-full px-2 py-1 mx-2 bg-gray-200">
            </div>
            <div class="my-2">
                <button type="button" v-on:click="addNew"
                    class="bg-green-500 rounded-full mx-1 px-2 py-1 text-black">Submit</button>
                <button type="button" v-on:click="close"
                    class="bg-orange-500 rounded-full mx-1 px-2 py-1 text-black">Cancle</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    name: 'addModal',
    data() {
        return {
            name: '',
            meta_title: '',
            slug: '',
            user_id: '',
            price: '',
            discount: '',
            type: ''
        }
    },
    methods: {
        close() {
            this.$emit('close')
        },
        addNew() {
            axios.post('/api/product', {
                name: this.name,
                meta_title: this.meta_title,
                slug: this.slug,
                user_id: '',
                price: this.price,
                discount: this.discount,
                type: this.type
            }).then(res => {
                if (res.status === 201) {
                    toast.success('Add new product success', {
                        autoClose: 1000
                    });
                    this.$emit('close');
                }
            }).catch((error) => {
                toast.error('Add new product fail', {
                    autoClose: 1000
                });
            })

        }
    }
}
</script>