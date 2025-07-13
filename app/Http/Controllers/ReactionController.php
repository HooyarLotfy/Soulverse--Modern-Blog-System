<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Reaction;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:like,dislike',
            'post_id' => 'nullable|exists:posts,id',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $user = Auth::user();
        $type = $request->type;
        $postId = $request->post_id;
        $commentId = $request->comment_id;

        // Check if user already has this exact reaction
        $existingReaction = Reaction::where([
            'user_id' => $user->id,
            'post_id' => $postId,
            'comment_id' => $commentId,
            'type' => $type,
        ])->first();

        if ($existingReaction) {
            // If they already have this reaction, remove it (toggle off)
            $existingReaction->delete();
        } else {
            // Remove any other reaction they might have for this post/comment
            Reaction::where([
                'user_id' => $user->id,
                'post_id' => $postId,
                'comment_id' => $commentId,
            ])->delete();
            
            // Add the new reaction
            Reaction::create([
                'user_id' => $user->id,
                'post_id' => $postId,
                'comment_id' => $commentId,
                'type' => $type,
            ]);
        }        return back();
    }
    
    public function destroy(Request $request)
    {
        $request->validate([
            'post_id' => 'nullable|exists:posts,id',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        $user = Auth::user();
        $postId = $request->post_id;
        $commentId = $request->comment_id;

        // Remove all reactions from this user for this post/comment
        Reaction::where([
            'user_id' => $user->id,
            'post_id' => $postId,
            'comment_id' => $commentId,
        ])->delete();

        return back();
    }
}
