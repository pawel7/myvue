## Problems with the development of the application



1. Uncaught TypeError: Vue.component is not a function

[Solution](https://github.com/laravel-mix/laravel-mix/issues/2747)

Add `.default` after require("vue") in `resources/js/app.js`:
```
window.Vue = require("vue").default;
```

2. Source map error: Error: request failed with status 404
URL : http://127.0.0.1:8002/js/app.js

[Solution](https://stackoverflow.com/questions/49726204/source-map-error-request-failed-with-status-404-resource-url-http-mywebsite)



3. Module parse failed: Unexpected token (1:0)  
You may need an appropriate loader to handle this file type, currently no loaders are configured to process this file.

```
npm run dev
...
✖ Mix
  Compiled with some errors in 16.29s

ERROR in ./resources/js/components/Front.vue 1:0
Module parse failed: Unexpected token (1:0)
You may need an appropriate loader to handle this file type, currently no loaders are configured to process this file. See https://webpack.js.org/concepts#loaders
> <template>
|     <div class="container" :class="{'loading': loading}">
|                 <h1 class="my-4">Users and Posts ( Front.vue )</h1>

ERROR in ./resources/js/components/PostCreate.vue 1:0
Module parse failed: Unexpected token (1:0)
You may need an appropriate loader to handle this file type, currently no loaders are configured to process this file. See https://webpack.js.org/concepts#loaders
> <template>
|     <div>
|     <form @submit.prevent="submit">

webpack compiled with 2 errors
```
[Solution](https://laracasts.com/discuss/channels/elixir/you-may-need-an-appropriate-loader-to-handle-this-file-type-currently-no-loaders-are-configured-to-process-this-file)

If you’ve updated to Mix 6 recently then you need to add .vue() to your webpack.mix.js file for Mix to compile your Vue components now.

```
mix.js('resources/js/app.js', 'public/js').vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
```

4. Though I have logged as an admin user, when I submit a new post with `localhost:8000/posts/create` I get `401 Unauthorized`.

5. How to pass the current logged user user_id to a javascript .vue file, e.g. `js/components/PostCreate.vue` ?

6. Why there is no method="POST" in a form in vue ?  
