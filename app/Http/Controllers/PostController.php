<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of all posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all posts from the database
        $posts = Post::all();
        
        // Return the 'posts.index' view with the list of posts
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Get the currently authenticated user
        $user = auth()->user();
        
        // Create a new instance of the Post model
        $post = new Post();
        
        // Set the title and body of the post from the request data
        $post->title = $request->title;
        $post->body = $request->body;
        
        // Set the user_id of the post to the authenticated user's id
        $post->user_id = $user->id;
        
        // Save the post to the database
        $post->save();
        
        // Redirect to the '/posts' route
        return redirect('/posts');
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Retrieve the post by its id, including the related user
        // The firstOrFail() method will throw an exception if the post is not found
        $post = Post::with('user')->where('id', $id)->firstOrFail();
        
        // Return the 'posts.show' view with the post data
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post, $id){
        Gate ::authorize('update', $post);
        // the firstOrFail() method will throw an exception if the post is not found
  
        $post = Post::where('id', $id)->firstOrFail();
        
        // Return the 'posts.edit' view with the post data
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Retrieve the post by its id
        // The firstOrFail() method will throw an exception if the post is not found
        $post = Post::where('id', $id)->firstOrFail();
        
        // Update the title and body of the post with data from the request
        $post->title = $request->title;
        $post->body = $request->body;
        
        // Save the updated post to the database
        $post->save();
        
        // Redirect to the '/posts' route
        return redirect('/posts');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Retrieve the post by its id
        // The firstOrFail() method will throw an exception if the post is not found
        $post = Post::where('id', $id)->firstOrFail();
        
        // Delete the post from the database
        $post->delete();
        
        // Redirect to the '/posts' route
        return redirect('/posts');
    }
}
