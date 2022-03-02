<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List ( UserComponent.vue )</div>
                 
                <div class="card-body">
                <table>
                    <tr>
                        <th width="30%">Name</th>
                        <th width="40%">Email</th>
                        <th width="20%">Is admin</th>                   
                    </tr>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.is_admin }}</td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        data() {
            return {
              users: {},
            }
        },
        methods: {
            getUser(){
                axios.get('/api/users')
                     .then((response)=>{
                       this.users = response.data.users
                     })
            }
        },
        created() {
            this.getUser()
        }
    }
</script> 