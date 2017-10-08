<template lang="html">
        <h2 class="md-title">Users</h2>
</template>

<script>
    export default {
        props: [
            'users'
        ],
        data(){
            return {
                list: [],
                sortProperty: 'name',
                sortDirection: 1
            }
        },
        methods: {
            sort: function(){

            }
        },
        mounted() {
            
        }
    }
</script>