<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Arc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArcController extends Controller
{
    public function index()
    {
        $arcs = Arc::withCount('posts')
                   ->with(['posts' => function($query) {
                       $query->latest()->take(3);
                   }])
                   ->latest()
                   ->get();
        
        return view('arcs.index', compact('arcs'));
    }

    public function show(Arc $arc)
    {
        $posts = $arc->posts()->with('user')->latest()->paginate(10);
        return view('arcs.show', compact('arc', 'posts'));
    }

    public function create()
    {
        $user = auth()->user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Only administrators can create arcs.');
        }

        return view('arcs.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Only administrators can create arcs.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $arc = new Arc($validated);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('arcs', 'public');
            $arc->cover_image = $path;
        }

        $arc->save();

        return redirect()->route('arcs.index')
                        ->with('success', 'Arc created successfully!');
    }

    public function edit(Arc $arc)
    {
        $user = auth()->user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Only administrators can edit arcs.');
        }

        return view('arcs.edit', compact('arc'));
    }

    public function update(Request $request, Arc $arc)
    {
        $user = auth()->user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Only administrators can update arcs.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        if ($request->hasFile('cover_image')) {
            // Delete old cover image if exists
            if ($arc->cover_image) {
                Storage::disk('public')->delete($arc->cover_image);
            }
            $path = $request->file('cover_image')->store('arcs', 'public');
            $validated['cover_image'] = $path;
        }

        $arc->update($validated);

        return redirect()->route('arcs.index')
                        ->with('success', 'Arc updated successfully!');
    }

    public function destroy(Arc $arc)
    {
        $user = auth()->user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Only administrators can delete arcs.');
        }

        // Delete cover image if exists
        if ($arc->cover_image) {
            Storage::disk('public')->delete($arc->cover_image);
        }

        $arc->delete();

        return redirect()->route('arcs.index')
                        ->with('success', 'Arc deleted successfully!');
    }
}
