<template>
    <div class="col-span-1">
        <router-link v-for="category in categories" :to="'/categories/'+category.id">
           {{ category.name }}
        </router-link>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: "navigation",
    data() {
        return {

            categories: [],
        }
    },
    created() {
        axios.get('api/categories').then(res => {
            this.categories = res.data;
        })
    },
    methods: {

    }
}
</script>