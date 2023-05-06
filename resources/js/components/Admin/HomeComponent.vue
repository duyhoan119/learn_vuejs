<template>
    <div>
        <div>
            <div class="grid grid-cols-9">
                <div class="col-span-1">
                    <router-link :to="'/products'">
                        Product
                    </router-link>
                </div>
                <div class="col-span-8">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Home',

}
</script>