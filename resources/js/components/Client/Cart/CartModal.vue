<template>
    <div class="z-10 mx-20 my-11 w-4/5 h-4/5 bg-slate-300 rounded-lg bg-opacity-95 absolute">
        <div class="grid grid-cols-6">
            <div class="col-span-4">
                <h1 class="text-black font-bold text-center">Cart</h1>
                <div class="m-1">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Tên</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Loại</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">GIá</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Số lượng</th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in orders['order_item']"
                                class="overflow-x-auto bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ item.product.name }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{
                                        exportProductVariant(item.product_variant) }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ item.price }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ item.quantity }}
                                </td>
                                <td>
                                    <button v-on:click="deleteCart(item.id)" class="text-red-700 font-bold">X</button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div col-span-2>
                thong tin thnag toan
            </div>
        </div>
        <button v-on:click="close"
            class="bg-orange-400 text-black rounded-full text-xs font-bold px-2 py-1 mx-2">Close</button>
    </div>
</template>
<script>
import axios from 'axios';
import { toast } from 'vue3-toastify';

export default {
    name: 'cartModal',
    data() {
        return {
            orders: []
        }
    }, methods: {
        close() {
            this.$emit('close')
        },
        exportProductVariant(produtcVariant) {

        },
        deleteCart(id) {
            axios.delete('api/orders/item/' + id).then(res => {
                console.log(res);
                toast.success('xoa san pham thanh cong');
            })
        }
    }, mounted() {
        axios.get('api/orders').then(res => {
            this.orders = res.data;
        })
    }
}

</script>