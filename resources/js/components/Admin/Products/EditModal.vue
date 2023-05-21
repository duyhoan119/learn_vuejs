<template>
    <div>
        <h2 class="text-center font-bold">EDIT</h2>
        <form action="">
            <div class="my-1">
                <label for="name">Name</label>
                <input id="name" type="text" class="bg-gray-200 rounded-full px-2 py-1" v-model="editData.name">
            </div>
            <div class="my-1">
                <label for="title">Meta title</label>
                <input id="meta_title" type="text" class="bg-gray-200 rounded-full px-2 py-1" v-model="editData.meta_title">
            </div>
            <div class="my-1">
                <label for="slug">Slug</label>
                <input id="slug" type="text" class="bg-gray-200 rounded-full px-2 py-1" v-model="editData.slug">
            </div>
            <div class="my-1">
                <label for="price">Price</label>
                <input id="price" type="text" class="bg-gray-200 rounded-full px-2 py-1" v-model="editData.price">
            </div>
            <div class="my-1">
                <label for="discount">Discount</label>
                <input id="discount" type="text" class="bg-gray-200 rounded-full px-2 py-1" v-model="editData.discount">
            </div>
            <div class="my-1">
                <button type="button" v-on:click="Save(editData.id)"
                    class="bg-green-600 text-black px-2 py-1 m-2 rounded-full">Submit</button>
                <button type="button" v-on:click="close"
                    class="bg-orange-500 text-black px-2 py-1 m-2 rounded-full">Cancle</button>
            </div>
        </form>

    </div>
</template>
<script>
import axios from 'axios';
import { toast } from 'vue3-toastify';

export default {
    name: 'editModal',
    props: {
        editData: Object
    },
    data() {
        return {
        }
    },
    methods: {
        close() {
            this.$emit('close');
        },
        Save(id) {
            var uri = '/api/product/' + id;
            axios.put(uri, this.editData).then(res => {
                toast.success('Update product success!', {
                    autoClose: 1000
                })
                this.$emit('close');

            }).catch((error) => {
                toast.error('Update product fales!', {
                    autoClose: 1000
                })
            })
        }
    }
}
</script>