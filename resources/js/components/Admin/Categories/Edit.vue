<template>
    <div>
        <h2 class="text-center font-bold">EDIT</h2>
        <form action="">
            <div class="my-1">
                <label for="name">Name</label>
                <input id="name" type="text" class="bg-gray-200 rounded-full px-2 py-1" v-model="editData.name">
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
    name: 'edit',
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
            var uri = '/api/categories/' + id;
            axios.put(uri, this.editData).then(res => {
                toast.success('Update category success!', {
                    autoClose: 1000
                })
                this.$emit('close');

            }).catch((error) => {
                toast.error('Update category fales!', {
                    autoClose: 1000
                })
            })
        }
    }
}
</script>