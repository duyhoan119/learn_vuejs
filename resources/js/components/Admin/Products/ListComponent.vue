<template>
    <div>
        <table class="table-auto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
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