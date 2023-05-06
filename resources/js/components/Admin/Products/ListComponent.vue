<template>
    <div class="grid grid-cols-8">
        <div class=" col-span-6">
            <button type="button" class="rounded-full text-black bg-green-600 p-1 m-1 text-xs"
                v-on:click="showModal('add')">ADD NEW +</button>
            <table class="table-fixed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>SLUG</th>
                        <th>SKU</th>
                        <th>PRICE</th>
                        <th>DISCOUNT</th>
                        <th>TYPE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products">
                        <td>{{ product.id }}</td>
                        <td>{{ product.name }}</td>
                        <td>{{ product.slug }}</td>
                        <td>{{ product.sku }}</td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.discount }}</td>
                        <td>{{ product.type }}</td>
                        <td>
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
            <editModal v-show="isEditModalVisible" @close="closeModal"></editModal>
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
            isEditModalVisible: false,
            isAddModalVisible: false
        }

    },
    components: {
        editModal,
        addModal,
    },
    created() {
        axios.get('api/product').then(res => {
            this.products = res.data
        })
    }, methods: {
        showModal(action, id = 0) {
            if (action === "add") {
                this.isAddModalVisible = true;
            }
            else {
                this.isEditModalVisible = true;
            }
        },
        closeModal() {
            axios.get('api/product').then(res => {
                this.products = res.data
            })
            this.isAddModalVisible = false;
            this.isEditModalVisible = false;
        },
        Delete(id) {
            var uri = 'api/product/' + id;
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