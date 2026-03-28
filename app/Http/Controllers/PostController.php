<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests; // This allows us to use $this->authorize()

    // 1. GET /posts: List all posts [cite: 67]
    public function index()
    {
        // Get all posts, including the user who wrote them, ordered by newest first
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // 2. GET /posts/create: Show the form [cite: 68]
    public function create()
    {
        return view('posts.create');
    }

    // 3. POST /posts: Store the post [cite: 69, 74]
    public function store(Request $request)
    {
        // Input validation [cite: 74]
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Save the post linked to the logged-in user
        $request->user()->posts()->create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created!');
    }

    // 4. GET /posts/{id}: View single post + comments [cite: 70, 80]
    public function show(Post $post)
    {
        // Load comments and the users who wrote them
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }

    // 5. GET /posts/{id}/edit: Show edit form [cite: 71, 82]
    public function edit(Post $post)
    {
        // Check if the logged-in user owns this post 
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    // 6. PUT /posts/{id}: Update logic [cite: 72, 74]
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    }

    // 7. DELETE /posts/{id}: Delete logic [cite: 73, 82]
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }
}