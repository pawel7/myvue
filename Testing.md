## Testing

You can test the application with Postman

PUT http://localhost:8005/api/posts/1
{
    "message": "Unauthenticated."
}

POST http://localhost:8005/api/login
[{"key":"email","value":"jalen02@example.net","description":"","type":"text","enabled":true},
{"key":"password","value":"test","description":"","type":"text","enabled":true}]

PUT http://localhost:8005/api/posts/1
{
    "message": "You cannot update somebody else's posts"
}

PUT http://localhost:8005/api/posts/6
[{"key":"title","value":"Post UPDATED by user #2. New text","description":"","type":"text","enabled":true}]

http://localhost:8005/api/logout
{
    "message": "Logged out"
}


POST http://localhost:8005/api/login as an admin user

He can update somebody else's post:

http://localhost:8005/api/posts/1
"data": {
        "id": 1,
        "title": "Post created by user #3. Recusandae porro.",
        "body": "Corporis aut veniam rerum. Quos illo totam blanditiis vero blanditiis velit laborum saepe.",
        "user_id": 3
    }
    