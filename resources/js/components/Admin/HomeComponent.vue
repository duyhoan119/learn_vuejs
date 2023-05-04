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

        <div class="main mt-4">
            <div class="row">
                <div class="col-md-8 offset-2 text-center">
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