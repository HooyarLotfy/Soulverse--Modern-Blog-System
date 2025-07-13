<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string|min:1',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->input('body'),
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comment added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $user = Auth::user();

        // Allow deletion if user is the comment owner, post owner, or an admin
        if ($user->id !== $comment->user_id && $user->id !== $comment->post->user_id && !$user->is_admin) {
             abort(403, 'You are not authorized to delete this comment.');
        }

        $post = $comment->post;
        $comment->delete();

        return redirect()->route('posts.show', $post)->with('success', 'Comment deleted successfully.');
    }
}
