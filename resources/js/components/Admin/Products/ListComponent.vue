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
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">SLUG</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">SKU</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">PRICE</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">DISCOUNT</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">TYPE</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products"
                        class="overflow-x-auto bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 ">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ product.id }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ product.name }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ product.slug }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ product.sku }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ product.price }}VND</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ product.discount }}VND
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ product.type }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <button class="bg-yellow-400 text-black rounded-full px-2 py-1 mx-1"
                                v-on:click="showModal('edit', product.id)">EDIT</button>
                            <button class="bg-red-400 text-black rounded-full px-2 py-1 mx-1"
                                v-on:click="Delete(product.id)">DELETE</button>
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
import editModal from './EditModal.vue';
import addModal from './AddModal.vue';
export default {
    name: 'ProductList',
    data() {

        return {
            products: [],
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
        axios.get('http://127.0.0.1:8000/api/product').then(res => {
            this.products = res.data
            console.log(this.products);
        })
    }, methods: {
        showModal(action, id = 0) {
            if (action === "add") {
                this.isAddModalVisible = true;
            }
            else {
                axios.get('http://127.0.0.1:8000/api/product/' + id).then(res => {
                    this.editData = res.data;
                })
                this.isEditModalVisible = true;
            }
        },
        closeModal() {
            axios.get('http://127.0.0.1:8000/api/product').then(res => {
                this.products = res.data
            })
            this.isAddModalVisible = false;
            this.isEditModalVisible = false;
        },
        Delete(id) {
            var uri = 'http://127.0.0.1:8000/api/product/' + id;
            axios.delete(uri).then(res => {
                if (res.status === 200) {
                    this.products = res.data;
                    alert("delete product success");
                }
                else {
                    alert("delete product false");
                }
            })
        }
    }
}
</script>