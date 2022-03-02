## Project description

This is example API with Laravel 9.
It shows users and their posts.
The user can be an admin on a normal user

The database is seeded with 10 users and 20 posts.
Users with odd id's are admins, and users with even identifiers are normal users.

A user can update his own post
An admin can update all posts.

## Installation

```bash
git clone https://github.com/pawel7/myvue.git
cd myvue
composer install
cp .env.example .env
```

Edit your database name, username, password in `.env` file.


To use `sqlite` you can just create an empty `database/database.sqlite` file:
```
touch database/database.sqlite
```

and set `DB_CONNECTION`

```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
```

For `sqlite` you can ignore or delete the lines
```
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=
```

When the database connection is ready do the folowing:

```bash
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve 
```

## Routes

The following route is shown using Vue.js ( Front.vue )
```
GET /
```

The following API routes are available:

## Public routes

```
POST /api/register
POST /api/login
```

List all posts
```
GET /api/posts
```

List all users
```
GET /api/users
```

List a single user
```
GET /api/users/{id}
```

List a single post
```
GET /api/posts/{id}
```
Search a POST by title
```
GET /posts/search/{title}
```

## Protected routes

Create a new post
```
POST /api/posts
```
   
Update a POST 
```
PUT /api/posts/{id}
```

Delete a POST    
```
DELETE /api/posts/{id}
```        

Logout
```
POST /api/logout
```
