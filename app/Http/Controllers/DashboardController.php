<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get recent posts (for all users to see)
        $query = Post::latest()->limit(6);
        
        // Non-admin users should only see public posts
        if (!$user->is_admin) {
            $query->where('is_private', false);
        }
        
        $recentPosts = $query->get();
        
        // User stats
        $userPostsCount = Post::where('user_id', $user->id)->count();
        $userCommentsCount = Comment::whereHas('post', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();
        $userReactionsCount = Reaction::whereHas('post', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();
        
        // We'll simulate views for now - add a real view tracking system later
        $userViewsCount = $userPostsCount * rand(10, 100);
        
        return view('dashboard', compact(
            'recentPosts', 
            'userPostsCount', 
            'userCommentsCount', 
            'userReactionsCount',
            'userViewsCount'
        ));
    }
}
