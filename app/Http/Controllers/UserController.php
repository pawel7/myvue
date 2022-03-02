<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource as UserResource;

class UserController extends Controller
{
    // public function index()
    // {
    //     return response()->json([
    //         'users' => User::latest()->get()
    //     ], Response::HTTP_OK);
         
    // }
    
    public function index()
    {
        return UserResource::collection(User::all());
    }
    
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get a single post
        $user = User::findOrFail($id);
        
        // Return a single post as a resource
        return new UserResource($user);
    }

}
