<?php
namespace App\Http\Controllers;
use Illuminate\Http\Response;
 
class UserController extends Controller
{
     
    public function index()
    {
        return view('users');
         
    }
    public function list()
    {
        return response()->json([
            'users' => \App\Models\User::latest()->get()
        ], Response::HTTP_OK);
         
    }
}