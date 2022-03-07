<template>
    <div>
    <form @submit.prevent="submit">
        <div class="alert alert-success" v-show="success">Post created successfully.</div>
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" v-model="fields.title" required autofocus>
                <div class="alert alert-danger" v-if="errors && errors.title">
                    {{ errors.title[0] }}
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
        <!--input type="hidden" id="user_id" name="user_id" v-model="user_id" value="user_id"-->
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Submit post
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
                fields: {},
                user_id: 0,
                success: false,
                errors: {}
            }
        },
        mounted() {
           // somehow get the logged user_id to this.user_id !!
        },
        methods: {
            submit() {
                axios.post('/api/posts', this.fields).then(response => {
                    
                    console.log('this.fields= ');
                    console.log( this.fields);
                    console.log('response.data= ');
                    console.log( response.data);
                    console.log('response.status: ', response.status);
                    console.log('response.statusText: ', response.statusText);
                    console.log(response.headers);
                    console.log(response.config);
                    this.fields = {};
                    this.success = true;
                    this.errors = {};
                }).catch(error => {
                    if (error.response.status == 422) {
                        console.log('This is Error 422');
                        this.errors = error.response.data.errors;
                    }
                    console.log('Error ', error.response.status);
                    console.log(error.response.data.errors);
                });
            }
        }
    }
</script>
