<template>
    <div>
        <div>
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-700 md:dark:bg-gray-900 dark:border-gray-700 md:mx-auto">
                <li>
                    <router-link :to="'/'"
                        class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500">
                        Home
                    </router-link>
                </li>
            </ul>
        </div>
        <div>
            <div class="grid grid-cols-9">
                <div class="col-span-1">
                    <Navigation></Navigation>
                </div>
                <div class="col-span-8">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navigation from './Client/layout/Navigation.vue';
export default {
    name: "Home",
    components() {
        Navigation;
    },
    components: { Navigation }
}
</script>