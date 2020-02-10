<template>
    <div class="rounded-full bg-blue-400 border border-gray-400 text-white w-10 h-10 flex justify-center items-center">
        {{ userCircle }}
    </div>
</template>

<script>
    export default {
        name: "UserCircle",
        props:[
            'name'
        ],
        computed: {
            userCircle() {
                if (this.name) {
                    return this.name.match(/[A-Z]/g).slice(0, 2).join('')
                }
                return '';
            }
        }
    }
</script>

<style scoped>

</style>
