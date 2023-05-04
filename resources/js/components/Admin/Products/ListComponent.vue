<template>
    <div>
        <button type="button" class="rounded-full text-black bg-green-600 p-1 m-1 text-xs">ADD NEW +</button>
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
                    <td>edit or delete</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ProductList',
    data() {

        return {
            products: []
        }

    },
    created() {
        var uri = 'api/product'
        axios.get(uri).then(res => {
            console.log(res.data);
            this.products = res.data
        })
    },
}
</script>