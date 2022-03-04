## Problems with the development of the application

Uncaught TypeError: Vue.component is not a function

[Solution](https://github.com/laravel-mix/laravel-mix/issues/2747)

Add `.default` after require("vue") in `resources/js/app.js`:
```
window.Vue = require("vue").default;
```
