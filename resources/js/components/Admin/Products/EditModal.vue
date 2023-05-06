<template>
    <div>
        <h1>edit</h1>
    </div>
</template>
<script>
export default {
    name: 'editModal',
    methods: {
        close() {
            this.emit('close');
        }
    }
}
</script>