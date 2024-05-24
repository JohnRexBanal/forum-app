<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of all posts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Retrieve all posts with their related user from the database
        $posts = Post::with('user')->get();
        
        // Return the posts as JSON
        return response()->json($posts, 200);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:255',
        ]);

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
        
        // Return the created post as JSON
        return response()->json($post, 201);
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Retrieve the post by its id, including the related user
        // The firstOrFail() method will throw an exception if the post is not found
        $post = Post::with('user')->where('id', $id)->firstOrFail();
        
        // Return the post as JSON
        return response()->json($post, 200);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        // Retrieve the post by its id
        // The firstOrFail() method will throw an exception if the post is not found
        $post = Post::where('id', $id)->firstOrFail();
        
        // Return the post as JSON
        return response()->json($post, 200);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Retrieve the post by its id
        // The firstOrFail() method will throw an exception if the post is not found
        $post = Post::where('id', $id)->firstOrFail();
        
        // Update the title and body of the post with data from the request
        $post->title = $request->title;
        $post->body = $request->body;
        
        // Save the updated post to the database
        $post->save();
        
        // Return the updated post as JSON
        return response()->json($post, 200);
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Retrieve the post by its id
        // The firstOrFail() method will throw an exception if the post is not found
        $post = Post::where('id', $id)->firstOrFail();
        
        // Check if the authenticated user is authorized to delete the post
        if ($post->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Delete the post from the database
        $post->delete();
        
        // Return a success message as JSON
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
