<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\ArcController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Http\Controllers\Auth\PasswordController;

// Show the main landing page (web.blade.php) for all guests, with posts and comments
Route::get('/', function () {
    $posts = Post::with(['arc', 'user', 'images', 'comments'])
        ->where('is_public', true)
        ->orWhere('is_public', null)  // Handle legacy posts
        ->latest()
        ->take(6)
        ->get();
    
    $comments = \App\Models\Comment::with(['user', 'post'])
        ->whereHas('post', function($query) {
            $query->where('is_public', true)->orWhere('is_public', null);
        })
        ->latest()
        ->take(5)
        ->get();
    
    return view('home', compact('posts', 'comments'));
})->name('home');

// Admin-only post management (must be above resource route)
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Arcs CRUD
    Route::get('/arcs/create', [ArcController::class, 'create'])->name('arcs.create');
    Route::post('/arcs', [ArcController::class, 'store'])->name('arcs.store');
    Route::get('/arcs/{arc}/edit', [ArcController::class, 'edit'])->name('arcs.edit');
    Route::patch('/arcs/{arc}', [ArcController::class, 'update'])->name('arcs.update');
    Route::delete('/arcs/{arc}', [ArcController::class, 'destroy'])->name('arcs.destroy');
});

// Publicly view posts (resource route must be after custom routes)
Route::resource('posts', PostController::class);
Route::resource('arcs', ArcController::class);

Route::get('/dashboard', function () {
    $user = Auth::user();
    $recentPosts = $user->posts()->latest()->take(5)->get();
    $totalPosts = $user->posts()->count();
    $totalReactions = $user->posts()->withCount('reactions')->get()->sum('reactions_count');
    $totalComments = $user->posts()->withCount('comments')->get()->sum('comments_count');
    
    return view('dashboard', compact('recentPosts', 'totalPosts', 'totalComments', 'totalReactions'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['put', 'patch'], '/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});

// Public profile routes
Route::get('/users/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Comment Routes
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');

// Reactions
Route::post('/reactions', [ReactionController::class, 'store'])->name('reactions.store');
Route::delete('/reactions', [ReactionController::class, 'destroy'])->name('reactions.destroy');

// Export posts as Markdown and PDF
Route::get('/posts/{post}/export/markdown', [PostController::class, 'exportMarkdown'])->name('posts.export.markdown');
Route::get('/posts/{post}/export/pdf', [PostController::class, 'exportPdf'])->name('posts.export.pdf');

// Legal pages
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

require __DIR__.'/auth.php';
