<template>
    <div>
    <form @submit.prevent="submit">
        <div class="alert alert-success" v-show="success">Post created successfully.</div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Your Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" v-model="fields.name" required autofocus>
                <div class="alert alert-danger" v-if="errors && errors.name">
                    {{ errors.name[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Your E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" v-model="fields.email" required autocomplete="email">
                <div class="alert alert-danger" v-if="errors && errors.email">
                    {{ errors.email[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="user_id" class="col-md-4 col-form-label text-md-right">Post User</label>

            <div class="col-md-6">
                <select class="form-control" id="user_id" name="user_id" v-model="fields.user_id">
                    <option v-for="user in users"
                            :value="user.id">{{ user.name }}
                    </option>
                </select>
                <div class="alert alert-danger" v-if="errors && errors.user_id">
                    {{ errors.user_id[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="body" class="col-md-4 col-form-label text-md-right">Post Body</label>

            <div class="col-md-6">
                <textarea id="body" rows="5" class="form-control" name="body" v-model="fields.body" required></textarea>
                <div class="alert alert-danger" v-if="errors && errors.body">
                    {{ errors.body[0] }}
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Submit Post
                </button>
            </div>
        </div>
    </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: null,
                fields: {},
                success: false,
                errors: {}
            }
        },
        mounted() {
            axios.get('/api/users').then(response => {
                this.users = response.data.data;
            })
        },
        methods: {
            submit() {
                axios.post('/api/posts', this.fields).then(response => {
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                }).catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                    console.log('Error');
                });
            }
        }
    }
</script>
