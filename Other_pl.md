[Laravel Vue Form Demo](https://github.com/LaravelDaily/Laravel-Vue-Form-Demo "Laravel Form transformed from Blade into a Vue.js component")  

W Laravel Vue Form Demo:
- ticket nie miał przypisanego użytkownika, tylko kategorię, jako klucz obcy `category_id`.
- jest używany  "php": "^7.2.5" i "laravel/framework": "^7.0".
- był podany tylko jeden URL: `GET /tickets`.
- tylko kilka ścieżek było określonych:

Routes zdefiniowane w pliku `api.php`:  

```
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', 'Api\\CategoryController');
Route::apiResource('tickets', 'Api\\TicketController');
```

Routes zdefiniowane w pliku `web.php`:  

```
Route::resource('tickets', 'TicketController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
```

W Laravel Vue Form Demo `php artisan route:list` daje poniższą tabelę:  

| Method    | URI                       | Name               | Action                                                                 | Middleware |
|-----------|---------------------------|--------------------|------------------------------------------------------------------------|------------|
| GET/HEAD  | api/categories            | categories.index   | App\Http\Controllers\Api\CategoryController@index                      | api        |
| POST      | api/categories            | categories.store   | App\Http\Controllers\Api\CategoryController@store                      | api        |
| GET/HEAD  | api/categories/{category} | categories.show    | App\Http\Controllers\Api\CategoryController@show                       | api        |
| PUT/PATCH | api/categories/{category} | categories.update  | App\Http\Controllers\Api\CategoryController@update                     | api        |
| DELETE    | api/categories/{category} | categories.destroy | App\Http\Controllers\Api\CategoryController@destroy                    | api        |
| GET/HEAD  | api/tickets               | tickets.index      | App\Http\Controllers\Api\TicketController@index                        | api        |
| POST      | api/tickets               | tickets.store      | App\Http\Controllers\Api\TicketController@store                        | api        |
| GET/HEAD  | api/tickets/{ticket}      | tickets.show       | App\Http\Controllers\Api\TicketController@show                         | api        |
| PUT/PATCH | api/tickets/{ticket}      | tickets.update     | App\Http\Controllers\Api\TicketController@update                       | api        |
| DELETE    | api/tickets/{ticket}      | tickets.destroy    | App\Http\Controllers\Api\TicketController@destroy                      | api        |
| GET/HEAD  | api/user                  |                    | Closure                                                                | api        |
|           |                           |                    |                                                                        | auth:api   |
| GET/HEAD  | home                      | home               | App\Http\Controllers\HomeController@index                              | web        |
|           |                           |                    |                                                                        | auth       |
| GET/HEAD  | login                     | login              | App\Http\Controllers\Auth\LoginController@showLoginForm                | web        |
|           |                           |                    |                                                                        | guest      |
| POST      | login                     |                    | App\Http\Controllers\Auth\LoginController@login                        | web        |
|           |                           |                    |                                                                        | guest      |
| POST      | logout                    | logout             | App\Http\Controllers\Auth\LoginController@logout                       | web        |
| POST      | password/confirm          |                    | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web        |
|           |                           |                    |                                                                        | auth       |
| GET/HEAD  | password/confirm          | password.confirm   | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web        |
|           |                           |                    |                                                                        | auth       |
| POST      | password/email            | password.email     | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web        |
| POST      | password/reset            | password.update    | App\Http\Controllers\Auth\ResetPasswordController@reset                | web        |
| GET/HEAD  | password/reset            | password.request   | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web        |
| GET/HEAD  | password/reset/{token}    | password.reset     | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web        |
| GET/HEAD  | register                  | register           | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web        |
|           |                           |                    |                                                                        | guest      |
| POST      | register                  |                    | App\Http\Controllers\Auth\RegisterController@register                  | web        |
|           |                           |                    |                                                                        | guest      |
| GET/HEAD  | tickets                   | tickets.index      | App\Http\Controllers\TicketController@index                            | web        |
| POST      | tickets                   | tickets.store      | App\Http\Controllers\TicketController@store                            | web        |
| GET/HEAD  | tickets/create            | tickets.create     | App\Http\Controllers\TicketController@create                           | web        |
| DELETE    | tickets/{ticket}          | tickets.destroy    | App\Http\Controllers\TicketController@destroy                          | web        |
| PUT/PATCH | tickets/{ticket}          | tickets.update     | App\Http\Controllers\TicketController@update                           | web        |
| GET/HEAD  | tickets/{ticket}          | tickets.show       | App\Http\Controllers\TicketController@show                             | web        |
| GET/HEAD  | tickets/{ticket}/edit     | tickets.edit       | App\Http\Controllers\TicketController@edit                             | web        |


W moim projekcie myvue `php artisan route:list` daje:  

  
  GET/HEAD        / ............................................................................................................................. HomeController@index  
  POST            _ignition/execute-solution ........................................... ignition.executeSolution › Spatie\LaravelIgnition › ExecuteSolutionController  
  GET/HEAD        _ignition/health-check ....................................................... ignition.healthCheck › Spatie\LaravelIgnition › HealthCheckController  
  POST            _ignition/update-config .................................................... ignition.updateConfig › Spatie\LaravelIgnition › UpdateConfigController  
  POST            api/login ..................................................................................................................... AuthController@login  
  POST            api/logout ................................................................................................................... AuthController@logout  
  GET/HEAD        api/posts ..................................................................................................................... PostController@index  
  POST            api/posts ..................................................................................................................... PostController@store  
  GET/HEAD        api/posts/search/{title} ..................................................................................................... PostController@search  
  GET/HEAD        api/posts/{id} ................................................................................................................. PostController@show  
  PUT             api/posts/{id} ............................................................................................................... PostController@update  
  DELETE          api/posts/{id} .............................................................................................................. PostController@destroy  
  POST            api/register ............................................................................................................... AuthController@register  
  GET/HEAD        api/users ..................................................................................................................... UserController@index  
  GET/HEAD        api/users/{id} ................................................................................................................. UserController@show  
  GET/HEAD        home ................................................................................................................... home › HomeController@index  
  GET/HEAD        livewire/livewire.js ........................................................................ Livewire\Controllers › LivewireJavaScriptAssets@source  
  GET/HEAD        livewire/livewire.js.map ...................................................................... Livewire\Controllers › LivewireJavaScriptAssets@maps  
  POST            livewire/message/{name} ............................................................ livewire.message › Livewire\Controllers › HttpConnectionHandler  
  GET/HEAD        livewire/preview-file/{filename} .......................................... livewire.preview-file › Livewire\Controllers › FilePreviewHandler@handle  
  POST            livewire/upload-file ........................................................ livewire.upload-file › Livewire\Controllers › FileUploadHandler@handle  
  GET/HEAD        login ................................................................................................... login › Auth\LoginController@showLoginForm  
  POST            login ................................................................................................................... Auth\LoginController@login  
  POST            logout ........................................................................................................ logout › Auth\LoginController@logout  
  GET/HEAD        password/confirm ................................................................. password.confirm › Auth\ConfirmPasswordController@showConfirmForm  
  POST            password/confirm ............................................................................................ Auth\ConfirmPasswordController@confirm  
  POST            password/email ................................................................... password.email › Auth\ForgotPasswordController@sendResetLinkEmail  
  GET/HEAD        password/reset ................................................................ password.request › Auth\ForgotPasswordController@showLinkRequestForm  
  POST            password/reset ................................................................................ password.update › Auth\ResetPasswordController@reset  
  GET/HEAD        password/reset/{token} ................................................................. password.reset › Auth\ResetPasswordController@showResetForm  
  GET/HEAD        posts ........................................................................................................... posts.index › PostController@index  
  POST            posts ........................................................................................................... posts.store › PostController@store  
  GET/HEAD        posts/create .................................................................................................. posts.create › PostController@create  
  GET/HEAD        posts/{post} ...................................................................................................... posts.show › PostController@show  
  PUT/PATCH       posts/{post} .................................................................................................. posts.update › PostController@update  
  DELETE          posts/{post} ................................................................................................ posts.destroy › PostController@destroy  
  GET/HEAD        posts/{post}/edit ................................................................................................. posts.edit › PostController@edit  
  GET/HEAD        posts_resource ....................................................................................................... PostController@index_resource  
  GET/HEAD        register ................................................................................... register › Auth\RegisterController@showRegistrationForm  
  POST            register .......................................................................................................... Auth\RegisterController@register  
  GET/HEAD        sanctum/csrf-cookie .................................................................................... Laravel\Sanctum › CsrfCookieController@show  
  GET/HEAD        users ......................................................................................................................... UserController@index  
  GET/HEAD        users_and_posts ............................................................................................................... HomeController@index  
  