<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource as PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();

        return view('posts.index', compact('posts'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_resource()
    {
        // Get the posts
        
        //$posts = Post::with('user')->get();
       // echo "<pre>"; var_dump($posts); echo "</pre>\n";
        $posts = Post::all();
        //echo "<pre>"; var_dump($posts); echo "</pre>\n";
        // $posts = Post::paginate(5);
            
        // Return collection of posts as a resource
        return PostResource::collection($posts);

        //   return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $user_id = auth()->user()->id;

        return view('posts.create', compact('user_id'));
    }

    public function store_validated_redirect_index(StorePostRequest $request)
    {
        Post::create($request->validated());

        return redirect()->route('posts.index');
    }

    // --------------------------------------

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
