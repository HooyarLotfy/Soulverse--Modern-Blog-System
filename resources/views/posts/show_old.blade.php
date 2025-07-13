@extends('layouts.app')

@section('title', $post->title . ' | Soulverse')
@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($post->body), 150) }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->body), 150) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($post->cover_image)
        <meta property="og:image" content="{{ asset('storage/' . $post->cover_image) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->body), 150) }}">
    @if($post->cover_image)
        <meta name="twitter:image" content="{{ asset('storage/' . $post->cover_image) }}">
    @endif
@endsection

@section('content')
    <!-- Post Header -->
    <article class="bg-white dark:bg-gray-900">
        <!-- Cover Image Section -->
        @if($post->cover_image)
            <div class="relative h-96 md:h-[500px] overflow-hidden">
                <img src="{{ asset('storage/' . $post->cover_image) }}" 
                     alt="{{ $post->title }}"
                     style="object-fit: cover; object-position: center;">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                
                <!-- Title Overlay on Image -->
                <div class="absolute bottom-8 left-0 right-0">
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
                            {{ $post->title }}
                        </h1>
                    </div>
                </div>
            </div>
        @endif

        <!-- Post Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @if(!$post->cover_image)
                <!-- Title for posts without cover image -->
                <header class="mb-12 text-center">
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                        {{ $post->title }}
                    </h1>
                </header>
            @endif

            <!-- Post Meta -->
            <div class="flex flex-wrap items-center gap-4 mb-8 text-sm text-gray-600 dark:text-gray-400">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                        {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                    </div>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $post->user->name ?? 'Anonymous' }}</span>
                </div>
                
                <span class="text-gray-400">•</span>
                <time datetime="{{ $post->created_at->toISOString() }}">
                    {{ $post->created_at->format('F j, Y') }}
                </time>
                
                @if($post->arc)
                    <span class="text-gray-400">•</span>
                    <a href="{{ route('arcs.show', $post->arc) }}" 
                       class="inline-flex items-center px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full hover:bg-indigo-200 dark:hover:bg-indigo-800 transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        {{ $post->arc->title }}
                    </a>
                @endif
                
                @if($post->privacy === 'private')
                    <span class="text-gray-400">•</span>
                    <span class="inline-flex items-center px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Private
                    </span>
                @endif
            </div>

            <!-- Post Content -->
            <div class="prose prose-lg dark:prose-invert max-w-none mb-12">
                {!! $post->body !!}
            </div>

            <!-- Post Actions -->
            <div class="flex flex-wrap items-center gap-4 mb-8 pb-8 border-b border-gray-200 dark:border-gray-700">
                <!-- Reactions -->
                <form method="POST" action="{{ route('reactions.store') }}" class="inline">
                    @csrf
                    <input type="hidden" name="type" value="like">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" 
                            class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        {{ $post->reactions->count() }}
                    </button>
                </form>

                <!-- Comments Count -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    {{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}
                </div>

                <!-- Views -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    {{ $post->views ?? 0 }} {{ Str::plural('view', $post->views ?? 0) }}
                </div>
            </div>

            <!-- Admin Actions -->
            @if(Auth::user() && Auth::user()->is_admin)
                <div class="flex flex-wrap gap-3 mb-8">
                    <a href="{{ route('posts.edit', $post) }}" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Post
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" 
                          onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Post
                        </button>
                    </form>
                </div>
            @endif

            <!-- Navigation -->
            <div class="mb-12">
                <a href="{{ route('posts.index') }}" 
                   class="inline-flex items-center gap-2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to All Posts
                </a>
            </div>
        </div>
    </article>

    <!-- Comments Section -->
    <section class="bg-gray-50 dark:bg-gray-800 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">
                Comments ({{ $post->comments->count() }})
            </h2>

            <!-- Comment Form -->
            @auth
                <form method="POST" action="{{ route('comments.store') }}" class="mb-12">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <label for="comment-body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            Share your thoughts
                        </label>
                        <textarea name="body" 
                                  id="comment-body"
                                  rows="4" 
                                  class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors" 
                                  placeholder="Write a thoughtful comment..."></textarea>
                        <div class="mt-4 flex justify-end">
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Post Comment
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 mb-12 text-center">
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Please log in to join the conversation</p>
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 rounded-lg transition-colors">
                            Sign Up
                        </a>
                    </div>
                </div>
            @endauth

            <!-- Comments List -->
            @if($post->comments->count() > 0)
                <div class="space-y-6">
                    @foreach($post->comments as $comment)
                        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                                    {{ strtoupper(substr($comment->user->name ?? 'A', 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="font-semibold text-gray-900 dark:text-white">
                                            {{ $comment->user->name ?? 'Anonymous' }}
                                        </span>
                                        <span class="text-gray-400">•</span>
                                        <time class="text-sm text-gray-500 dark:text-gray-400" 
                                              datetime="{{ $comment->created_at->toISOString() }}">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </time>
                                    </div>
                                    <div class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No comments yet</h3>
                    <p class="text-gray-500 dark:text-gray-400">Be the first to share your thoughts!</p>
                </div>
            @endif
        </div>
    </section>
@endsection


