@extends('layouts.base')

@section('title', 'Create Post | ' . config('app.name', 'SoulVerse'))
@section('description', 'Share your story, thoughts, and experiences with the SoulVerse community')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <style>
        .trix-button-group--file-tools { display: none !important; }
        trix-editor {
            background-color: white;
            border-radius: 0.5rem;
            border-color: var(--gray-300);
            min-height: 300px;
            padding: 1rem;
            border-width: 1px;
        }
        .dark trix-editor {
            background-color: var(--gray-700);
            border-color: var(--gray-600);
            color: var(--gray-100);
        }
        .dark .trix-toolbar .trix-button {
            background: var(--gray-800);
        }
        .dark .trix-toolbar .trix-button:not(:disabled) {
            fill: var(--gray-300);
        }
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            color: var(--gray-800);
        }
        .dark .form-input {
            background-color: var(--gray-700);
            border-color: var(--gray-600);
            color: white;
        }
    </style>
@endpush

@section('content')
<main class="bg-gray-50 dark:bg-gray-900 py-12">
    <div class="container" style="max-width: 900px; margin: 2rem auto; padding: 0 1rem;">
        @if(Auth::user() && Auth::user()->is_admin)
            <div class="form-container bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold font-serif text-gray-800 dark:text-white">Create New Post</h1>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Craft your next story for the SoulVerse.</p>
                </div>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="title" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}" required>
                    </div>

                    <div>
                        <label for="body" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Content</label>
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor input="body"></trix-editor>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Category</label>
                            <input type="text" name="category" id="category" class="form-input" value="{{ old('category') }}" placeholder="e.g., Life Arc, Tech">
                        </div>
                        <div>
                            <label for="arc_id" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Story Arc (Optional)</label>
                            <select name="arc_id" id="arc_id" class="form-input">
                                <option value="">None</option>
                                @foreach($arcs as $arc)
                                    <option value="{{ $arc->id }}" {{ old('arc_id') == $arc->id ? 'selected' : '' }}>{{ $arc->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="cover_image" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Cover Image</label>
                        <input type="file" name="cover_image" id="cover_image" class="w-full text-gray-700 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary dark:file:bg-primary/20 dark:file:text-primary-light hover:file:bg-primary/20">
                    </div>

                    <div class="flex justify-end gap-4 pt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">✨ Publish Post</button>
                    </div>
                </form>
            </div>
        @else
            <div class="text-center py-16">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Access Restricted</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">Only administrators can create new posts.</p>
                <a href="{{ route('posts.index') }}" class="btn btn-primary mt-6">Explore Posts</a>
            </div>
        @endif
    </div>
</main>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endpush


