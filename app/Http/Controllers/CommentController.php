<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // POST /posts/{id}/comments: Add a comment [cite: 78]
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'comment' => $validated['comment'],
            'user_id' => Auth::id(), // Null if guest, ID if logged in [cite: 78]
        ]);

        return back()->with('success', 'Comment added!');
    }

    // DELETE /comments/{id}: Delete a comment [cite: 79]
    public function destroy(Comment $comment)
    {
        // Only the comment owner or post owner can delete [cite: 79, 82]
        if (Auth::id() === $comment->user_id || Auth::id() === $comment->post->user_id) {
            $comment->delete();
            return back()->with('success', 'Comment deleted!');
        }

        abort(403);
    }
}