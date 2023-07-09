<template>
    <div class="grid grid-cols-8">
        <div class=" col-span-6 mx-4">
            <button type="button" class="rounded-full text-black bg-green-600 p-1 m-1 text-xs"
                v-on:click="showModal('add')">ADD NEW +</button>
            <table class="min-w-full">
                <thead class="bg-gray-200 border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ID</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">NAME</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="category in categories"
                        class="overflow-x-auto bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 ">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ category.id }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ category.name }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <button class="bg-yellow-400 text-black rounded-full px-2 py-1 mx-1"
                                v-on:click="showModal('edit', category)">EDIT</button>
                            <button class="bg-red-400 text-black rounded-full px-2 py-1 mx-1"
                                v-on:click="Delete(category.id)">DELETE</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-span-2">
            <editModal v-bind:editData="editData" v-show="isEditModalVisible" @close="closeModal"></editModal>
            <addModal v-show="isAddModalVisible" @close="closeModal"></addModal>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import editModal from './Edit.vue';
import addModal from './add.vue';
import { toast } from 'vue3-toastify';
export default {
    name: 'list',
    data() {

        return {
            categories: [],
            editData: {},
            isEditModalVisible: false,
            isAddModalVisible: false
        }

    },
    components: {
        editModal,
        addModal,
    },
    created() {
        axios.get('/api/categories').then(res => {
            this.categories = res.data
        })
    }, methods: {
        showModal(action, category = {}) {
            if (action === "add") {
                this.isAddModalVisible = true;
            }
            else {
                this.editData = category
                this.isEditModalVisible = true;
            }
        },
        closeModal() {
            axios.get('/api/categories').then(res => {
                this.categories = res.data
            })
            this.isAddModalVisible = false;
            this.isEditModalVisible = false;
        },
        Delete(id) {
            var uri = '/api/categories/' + id;
            axios.delete(uri).then(res => {
                this.categories = res.data;
                toast.success('delete category success!', {
                    autoClose: 1000
                })
            }).catch((error) => {
                toast.error('delete category false!');
            })
        }
    }
}
</script>