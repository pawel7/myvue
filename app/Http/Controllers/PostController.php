<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the posts
        $posts = Post::paginate(5);
            
        // Return collection of posts as a resource
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
           // 'user_id' => 'required|integer'
             ]);
        
        $arr = $request->all();
        $curr_user_id = auth()->user()->id;
        $arr[ 'user_id' ] = $curr_user_id;
        return Post::create($arr);
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
        $post = Post::findOrFail($id);
        
        // Return a single post as a resource
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $post = Post::findOrFail( $id );
       
       if( !auth()->user()->is_admin && $post->user_id != auth()->user()->id )
        {
            abort(
                response()->json(['message' => 'You cannot update somebody else\'s posts'], 403 )
            );
        }
        //if( !auth()->check() || !auth()->user()->is_admin){
        //    abort(403);
        //}

        
        $post->update($request->all());
        return new PostResource($post);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return Post::destroy($id);

        // Get the post
        $post = Post::findOrFail($id);
        if( !auth()->user()->is_admin && $post->user_id != auth()->user()->id )
        {
            abort(
                response()->json(['message' => 'You cannot delete somebody else\'s posts'], 403 )
            );
        }
        //  Delete the post, return as confirmation
        if ($post->delete()) {
            return new PostResource($post);
        }
    }

    /**
     * Search for a title
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Post::where('title', 'like', '%'.$title.'%')->get();
    }
}
