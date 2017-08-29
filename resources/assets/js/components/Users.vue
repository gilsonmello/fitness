<template lang="html">
    <div>
        <table id="example2" cellspacing="0" class="table table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['users'],
        data(){
            return {
                message: 'This is some message text',
                user: 'Gilson'
            }
        },
        mounted() {
            window.console.log(JSON.parse(this.users))
        }
    }
</script>