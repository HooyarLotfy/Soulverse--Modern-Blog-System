<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $post->title }} | {{ config('app.name', 'SoulVerse') }}</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="{{ Str::limit(strip_tags($post->body), 150) }}">
    <meta name="keywords" content="blog post, {{ $post->title }}, creative writing">
    <meta name="author" content="{{ $post->user->name ?? 'SoulVerse' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->body), 150) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($post->cover_image)
        <meta property="og:image" content="{{ asset('storage/' . $post->cover_image) }}">
    @endif
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->body), 150) }}">
    @if($post->cover_image)
        <meta name="twitter:image" content="{{ asset('storage/' . $post->cover_image) }}">
    @endif
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🧿</text></svg>">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            /* Colors */
            --primary: #8b5cf6;
            --primary-dark: #7c3aed;
            --secondary: #06b6d4;
            --accent: #f59e0b;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            
            /* Typography */
            --font-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
            --font-serif: 'Playfair Display', ui-serif, Georgia, serif;
            --font-mono: 'JetBrains Mono', ui-monospace, monospace;
        }

        * {
            box-sizing: border-box;
        }

        html {
            font-family: var(--font-sans);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--gray-50) 0%, #ffffff 100%);
            color: var(--gray-800);
            line-height: 1.6;
            transition: all 0.3s ease;
        }

        .dark body {
            background: linear-gradient(135deg, var(--gray-900) 0%, #0a0f1c 100%);
            color: var(--gray-100);
        }

        /* Navigation Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
            position: sticky;
            top: 0;
            z-index: 50;
            transition: all 0.3s ease;
        }

        .dark .navbar {
            background: rgba(15, 23, 42, 0.95);
            border-bottom: 1px solid rgba(71, 85, 105, 0.2);
        }

        .navbar-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .dark .nav-link {
            color: var(--gray-300);
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--gray-600);
            border: 2px solid var(--gray-300);
        }

        .dark .btn-outline {
            color: var(--gray-300);
            border-color: var(--gray-600);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--gray-600);
            cursor: pointer;
            padding: 0.5rem;
        }

        .dark .mobile-menu-btn {
            color: var(--gray-300);
        }

        .mobile-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-top: 1px solid rgba(148, 163, 184, 0.1);
            padding: 1rem;
        }

        .dark .mobile-menu {
            background: rgba(15, 23, 42, 0.98);
            border-top: 1px solid rgba(71, 85, 105, 0.2);
        }

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .mobile-menu.active {
                display: block;
            }
            
            .mobile-nav {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .dark .card {
            background: var(--gray-800);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Post Content Styles */
        .prose {
            font-family: var(--font-serif);
            color: var(--gray-700);
            max-width: none;
        }

        .dark .prose {
            color: var(--gray-300);
        }

        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            font-family: var(--font-serif);
            font-weight: 700;
            color: var(--gray-900);
            margin-top: 2em;
            margin-bottom: 1em;
        }

        .dark .prose h1, .dark .prose h2, .dark .prose h3, .dark .prose h4, .dark .prose h5, .dark .prose h6 {
            color: var(--gray-100);
        }

        .prose p {
            margin-bottom: 1.5em;
            font-size: 1.125rem;
            line-height: 1.8;
        }

        .prose blockquote {
            border-left: 4px solid var(--primary);
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            background: var(--gray-50);
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .dark .prose blockquote {
            background: var(--gray-800);
        }

        /* Footer Styles */
        .footer {
            background: var(--gray-900);
            color: var(--gray-100);
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .footer-section p,
        .footer-section a {
            color: var(--gray-300);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-700);
            padding-top: 1rem;
            text-align: center;
            color: var(--gray-400);
        }
    </style>
</head>

<body>
    @include('layouts.navigation')
        <div class="navbar-content">
            <a href="/" class="navbar-brand">
                <span>🧿</span>
                <span>SoulVerse</span>
            </a>
            
            <ul class="navbar-nav">
                <li><a href="/" class="nav-link">Home</a></li>
                <li><a href="{{ route('posts.index') }}" class="nav-link active">Posts</a></li>
                <li><a href="{{ route('arcs.index') }}" class="nav-link">Arcs</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                    <li><a href="{{ route('posts.create') }}" class="btn btn-primary">Write</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-primary">Join</a></li>
                @endauth
            </ul>
            
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-nav">
                <a href="/" class="nav-link">Home</a>
                <a href="{{ route('posts.index') }}" class="nav-link active">Posts</a>
                <a href="{{ route('arcs.index') }}" class="nav-link">Arcs</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Write</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <!-- Post Header -->
        <article class="bg-white dark:bg-gray-900">
            <!-- Cover Image Section -->
            @if($post->cover_image)
                <div class="relative h-96 md:h-[500px] overflow-hidden">
                    <img src="{{ asset('storage/' . $post->cover_image) }}" 
                         alt="{{ $post->title }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    
                    <!-- Title Overlay on Image -->
                    <div class="absolute bottom-8 left-0 right-0">
                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight font-serif">
                                {{ $post->title }}
                            </h1>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Post Content -->
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                @if(!$post->cover_image)
                    <!-- Title for posts without cover image -->
                    <header class="mb-12 text-center">
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 leading-tight font-serif">
                            {{ $post->title }}
                        </h1>
                    </header>
                @endif

                <!-- Post Meta -->
                <div class="flex flex-wrap items-center gap-4 mb-8 text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex items-center gap-3">
                        @if($post->user->avatar)
                            <div class="w-10 h-10 rounded-full overflow-hidden">
                                <img src="{{ asset('storage/'.$post->user->avatar) . '?v=' . $post->user->updated_at->timestamp }}" 
                                     alt="{{ $post->user->name }}"
                                     class="w-full h-full object-cover"
                                     data-avatar-user="{{ $post->user->id }}"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm" 
                                     style="display: none;"
                                     data-avatar-user="{{ $post->user->id }}">
                                    {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                                </div>
                            </div>
                        @else
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm"
                                 data-avatar-user="{{ $post->user->id }}">
                                {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <div class="font-semibold text-gray-900 dark:text-white">{{ $post->user->name ?? 'Anonymous' }}</div>
                            <time datetime="{{ $post->created_at->toISOString() }}" class="text-xs text-gray-500">
                                {{ $post->created_at->format('F j, Y') }}
                            </time>
                        </div>
                    </div>
                    
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
                                class="inline-flex items-center gap-2 px-6 py-3 bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            {{ $post->reactions->count() }}
                        </button>
                    </form>

                    <!-- Comments Count -->
                    <div class="inline-flex items-center gap-2 px-6 py-3 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        {{ $post->comments->count() }} {{ Str::plural('comment', $post->comments->count()) }}
                    </div>

                    <!-- Views -->
                    <div class="inline-flex items-center gap-2 px-6 py-3 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg">
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
                           class="btn btn-primary">
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
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">
                    Comments ({{ $post->comments->count() }})
                </h2>

                <!-- Comment Form -->
                @auth
                    <form method="POST" action="{{ route('comments.store') }}" class="mb-12">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="card p-6">
                            <label for="comment-body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                                Share your thoughts
                            </label>
                            <textarea name="body" 
                                      id="comment-body"
                                      rows="4" 
                                      class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors" 
                                      placeholder="Write a thoughtful comment..."></textarea>
                            <div class="mt-4 flex justify-end">
                                <button type="submit" class="btn btn-primary">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    Post Comment
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="card p-6 mb-12 text-center">
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Please log in to join the conversation</p>
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline">
                                Sign Up
                            </a>
                        </div>
                    </div>
                @endauth

                <!-- Comments List -->
                @if($post->comments->count() > 0)
                    <div class="space-y-6">
                        @foreach($post->comments as $comment)
                            <div class="card p-6">
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
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = document.querySelector('.mobile-menu-btn');
            
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>


