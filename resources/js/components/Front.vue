<template>
    <div class="container" :class="{'loading': loading}">
                <h1 class="my-4">Users and Posts ( Front.vue )</h1>
                 <div class="col-md-6">
                     <h2>Users</h2>
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
            <div class="col-md-6">
                <h2>Posts</h2>
                    <table>
                    <tr>
                        <th width="30%">Title</th>
                        <th width="60%">Body</th>
                        <th width="10%">User Id</th>                   
                    </tr>
                    <tr v-for="post in posts" :key="post.id">
                        <td>{{ post.title }}</td>
                        <td>{{ post.body }}</td>
                        <td>{{ post.user_id }}</td>
                    </tr>
                </table>
                </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                posts: [],
                users: [],
                loading: true
            }
        },

        mounted() {
            this.loadPosts();
            this.loadUsers();
        },

        methods: {
            loadPosts: function () {
                axios.get('/api/posts')
                    .then((response) => {
                        this.posts = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            loadUsers: function () {
                axios.get('/api/users')
                    .then((response) => {
                        this.users = response.data.data;
                        this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
