<?php

namespace App\Http\Controllers;

use App\Models\Arc;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\MarkdownConverter;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $query = Post::with(['user', 'arc', 'reactions', 'comments'])->where('is_public', true);

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('body', 'like', "%{$searchTerm}%")
                  ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                      $userQuery->where('name', 'like', "%{$searchTerm}%");
                  });
            });
        }

        if ($request->has('category')) {
            $query->where('category', $request->input('category'));
        }

        $sort = $request->input('sort', 'latest');
        switch ($sort) {
            case 'popular':
                $query->withCount('reactions')->orderByDesc('reactions_count');
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->latest();
                break;
        }

        $posts = $query->paginate(10);
        $categories = Post::where('is_public', true)->pluck('category')->unique()->filter();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        if (!$post->is_public && (!Auth::check() || Auth::id() !== $post->user_id)) {
            abort(404);
        }
        $post->load(['user', 'arc', 'comments.user', 'reactions']);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        if (!Auth::user()?->is_admin) {
            abort(403, 'Only administrators can create posts.');
        }
        $arcs = Arc::all();
        return view('posts.create', compact('arcs'));
    }

    public function store(Request $request)
    {
        if (!Auth::user()?->is_admin) {
            abort(403, 'Only administrators can store posts.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string|max:255',
            'arc_id' => 'nullable|exists:arcs,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_public' => 'boolean',
        ]);

        $validated['user_id'] = Auth::id();

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('posts', 'public');
        }

        $post = Post::create($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        if (!Auth::user()?->is_admin && Auth::id() !== $post->user_id) {
            abort(403, 'You do not have permission to edit this post.');
        }
        $arcs = Arc::all();
        return view('posts.edit', compact('post', 'arcs'));
    }

    public function update(Request $request, Post $post)
    {
        if (!Auth::user()?->is_admin && Auth::id() !== $post->user_id) {
            abort(403, 'You do not have permission to update this post.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'nullable|string|max:255',
            'arc_id' => 'nullable|exists:arcs,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_public' => 'boolean',
        ]);

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        if (!Auth::user()?->is_admin && Auth::id() !== $post->user_id) {
            abort(403, 'You do not have permission to delete this post.');
        }

        if ($post->cover_image) {
            Storage::disk('public')->delete($post->cover_image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    // Export post as PDF
    public function exportPdf(Post $post)
    {
        $pdf = Pdf::loadView('exports.post-pdf', compact('post'));
        return $pdf->download(Str::slug($post->title) . '.pdf');
    }
    
    public function exportMarkdown(Post $post)
    {
        $markdown = "# {$post->title}\n\n";
        $markdown .= "**Author:** {$post->user->name}\n";
        $markdown .= "**Created:** {$post->created_at->format('F j, Y')}\n";
        if ($post->category) {
            $markdown .= "**Category:** {$post->category}\n";
        }
        if ($post->arc) {
            $markdown .= "**Arc:** {$post->arc->title}\n";
        }
        $markdown .= "\n---\n\n";
        
        $converter = new MarkdownConverter();
        $markdown .= $converter->convert($post->body);

        $filename = Str::slug($post->title) . '.md';

        return response($markdown, 200, [
            'Content-Type' => 'text/markdown',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}

