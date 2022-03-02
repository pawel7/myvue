<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users and Posts</title>
</head>
<body>

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="font-weight-bold text-primary">All Users and Posts</h2>

        </div>
        <div class="card-body">
            <h3>Users</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Is Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($users as $user)
                           <tr>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>{{$user->is_admin}}</td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
    <h3>Posts</h3>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>User Id</th>    
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($posts as $post)
                           <tr>
                               <td>{{$post->title}}</td>
                               <td>{{$post->body}}</td>
                               <td>{{$post->user_id}}</td>    
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</body>
</html>