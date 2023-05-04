<template>
    <div>
        <div>
            <ul>
                <li>

                </li>
                <li>
                    <router-link :to="'/products'">
                        Product
                    </router-link>
                </li>
            </ul>
        </div>

        <div>
            <div class="grid grid-cols-9">
                <div class="col-span-1">

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