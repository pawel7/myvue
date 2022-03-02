<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        $posts = Post::all();

        return view('users_and_posts', compact('users', 'posts'));
    }
}
