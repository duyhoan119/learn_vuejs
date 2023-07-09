<template>
    <div class="w-full max-w-xs">
        <h2 class="text-center font-bold">
            Add new category
        </h2>
        <form action="">
            <div class="my-2">
                <label for="name">Name :</label>
                <input id="name" type="text" v-model="name" class=" rounded-full px-2 py-1 mx-2 bg-gray-200">
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
    name: 'add',
    data() {
        return {
            name: ''
        }
    },
    methods: {
        close() {
            this.$emit('close')
        },
        addNew() {
            axios.post('/api/categories', {
                name: this.name
            }).then(res => {
                if (res.status === 201) {
                    toast.success('Add new category success', {
                        autoClose: 1000
                    });
                    this.$emit('close');
                }
            }).catch((error) => {
                toast.error('Add new category fail', {
                    autoClose: 1000
                });
            })

        }
    }
}
</script>