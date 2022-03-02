## Testing

You can test the application with Postman

```
PUT http://localhost:8000/api/posts/1
{ 
    "message": "Unauthenticated."
}
```

```
POST http://localhost:8000/api/login
{ "key":"email","value":"jalen02@example.net" }
{"key":"password","value":"test" }
```

```
PUT http://localhost:8000/api/posts/1
{
    "message": "You cannot update somebody else's posts"
}
```

```
PUT http://localhost:8000/api/posts/6
{
    "key":"title",
    "value":"Post UPDATED by user #2. New text" 
}
```

```
POST http://localhost:8000/api/logout
{
    "message": "Logged out"
}
```

```
POST http://localhost:8000/api/login as an admin user
```
An admin can update somebody else's post:
```
http://localhost:8000/api/posts/1
"data": {
        "id": 1,
        "title": "Post created by user #3. Recusandae porro.",
        "body": "Corporis aut veniam rerum. Quos illo totam blanditiis vero blanditiis velit laborum saepe.",
        "user_id": 3
    }
```    