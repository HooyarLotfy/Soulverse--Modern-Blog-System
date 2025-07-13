<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>All Posts | {{ config('app.name', 'SoulVerse') }}</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="Explore a curated collection of thoughts, experiences, and creative expressions from our community of writers.">
    <meta name="keywords" content="blog, stories, writing, creative writing, community">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="All Posts | SoulVerse">
    <meta property="og:description" content="Explore a curated collection of thoughts, experiences, and creative expressions">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
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
            --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            --font-display: 'Playfair Display', Georgia, serif;
            --font-mono: 'JetBrains Mono', 'Fira Code', monospace;
            
            /* Spacing */
            --container-padding: 2rem;
            --section-padding: 4rem;
            
            /* Effects */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .dark {
            --gray-50: #0f172a;
            --gray-100: #1e293b;
            --gray-200: #334155;
            --gray-300: #475569;
            --gray-400: #64748b;
            --gray-500: #94a3b8;
            --gray-600: #cbd5e1;
            --gray-700: #e2e8f0;
            --gray-800: #f1f5f9;
            --gray-900: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-family: var(--font-primary);
            line-height: 1.6;
            scroll-behavior: smooth;
        }

        body {
            background: var(--gray-50);
            color: var(--gray-800);
            transition: all 0.3s ease;
            overflow-x: hidden;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem var(--container-padding);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--gray-800);
            text-decoration: none;
            font-family: var(--font-display);
        }

        .dark .logo {
            color: var(--gray-100);
        }

        .logo-icon {
            font-size: 2rem;
            filter: drop-shadow(0 2px 4px rgba(139, 92, 246, 0.3));
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            position: relative;
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
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
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 14px 0 rgba(139, 92, 246, 0.39);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(139, 92, 246, 0.5);
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .dark .btn-secondary {
            background: var(--gray-800);
            color: var(--gray-200);
            border: 1px solid var(--gray-700);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
            transform: translateY(-1px);
        }

        .dark .btn-secondary:hover {
            background: var(--gray-700);
        }

        .theme-toggle {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            background: var(--gray-100);
            transform: scale(1.1);
        }

        .dark .theme-toggle:hover {
            background: var(--gray-800);
        }

        /* Footer */
        .footer {
            background: var(--gray-100);
            border-top: 1px solid var(--gray-200);
            padding: var(--section-padding) 0 2rem;
            margin-top: auto;
        }

        .dark .footer {
            background: var(--gray-900);
            border-top: 1px solid var(--gray-800);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--container-padding);
            text-align: center;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--gray-800);
            margin-bottom: 1rem;
            font-family: var(--font-display);
        }

        .dark .footer-logo {
            color: var(--gray-100);
        }

        .footer-text {
            color: var(--gray-600);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .dark .footer-text {
            color: var(--gray-400);
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-link {
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .dark .footer-link {
            color: var(--gray-400);
        }

        .footer-link:hover {
            color: var(--primary);
        }

        .footer-bottom {
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .dark .footer-bottom {
            border-top: 1px solid var(--gray-800);
            color: var(--gray-400);
        }

        /* Page specific styles */
        .page-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 6rem 0 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.1;
        }

        .page-hero-content {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--container-padding);
        }

        .page-title {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 8vw, 4rem);
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, white 0%, rgba(255, 255, 255, 0.8) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .posts-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem var(--container-padding);
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }        .post-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--gray-200);
            position: relative;
        }

        .dark .post-card {
            background: var(--gray-800);
            border: 1px solid var(--gray-700);
        }

        .post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1;
        }

        .post-card:hover::before {
            left: 100%;
        }

        .post-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border-color: var(--primary);
        }

        .dark .post-card:hover {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }        .post-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: var(--gray-200);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .post-card:hover .post-image {
            transform: scale(1.05);
        }

        .post-content {
            padding: 1.5rem;
        }

        .post-meta {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .post-category {
            background: rgba(139, 92, 246, 0.1);
            color: var(--primary);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .post-date {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .post-title {
            font-family: var(--font-display);
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .dark .post-title {
            color: var(--gray-100);
        }        .post-title a {
            text-decoration: none;
            color: inherit;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            display: block;
        }

        .post-title a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .post-card:hover .post-title a::after {
            width: 100%;
        }

        .post-title a:hover {
            color: var(--primary);
            transform: translateX(4px);
        }

        .post-excerpt {
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .dark .post-excerpt {
            color: var(--gray-400);
        }

        .post-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .dark .post-footer {
            border-top: 1px solid var(--gray-700);
        }

        .post-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .author-avatar {
            width: 2rem;
            height: 2rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .author-name {
            font-weight: 500;
            color: var(--gray-700);
            font-size: 0.875rem;
        }

        .dark .author-name {
            color: var(--gray-300);
        }

        .post-stats {
            display: flex;
            gap: 1rem;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .admin-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .dark .admin-actions {
            border-top: 1px solid var(--gray-700);
        }

        .admin-btn {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .admin-btn-edit {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .admin-btn-edit:hover {
            background: rgba(59, 130, 246, 0.2);
        }

        .admin-btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: none;
            cursor: pointer;
        }

        .admin-btn-delete:hover {
            background: rgba(239, 68, 68, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .dark .empty-state h3 {
            color: var(--gray-200);
        }

        .empty-state p {
            color: var(--gray-600);
            margin-bottom: 2rem;
        }

        .dark .empty-state p {
            color: var(--gray-400);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-content {
                padding: 1rem;
            }

            .nav-links {
                gap: 1rem;
            }

            .nav-link {
                font-size: 0.875rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }

            .posts-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .posts-container {
                padding: 2rem 1rem;
            }

            .page-hero {
                padding: 4rem 0 3rem;
            }

            .footer-links {
                gap: 1rem;
            }
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head><body>
    @include('layouts.navigation')
        <div class="navbar-content">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-icon">🧿</span>
                <span>SoulVerse</span>
            </a>
            
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('posts.index') }}" class="nav-link active">Posts</a>
                <a href="{{ route('arcs.index') }}" class="nav-link">Arcs</a>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Write</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join Now</a>
                @endauth
                
                <button class="theme-toggle" onclick="toggleTheme()">
                    <span id="theme-icon">🌙</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-content">
            <h1 class="page-title">Discover Stories</h1>
            <p class="page-subtitle">
                Explore a curated collection of thoughts, experiences, and creative expressions from our community of writers
            </p>
            
            @auth
                @if(auth()->user()->is_admin)
                    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">
                            <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create New Post
                        </a>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); color: white;">
                            <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </div>
                @endif
            @endauth
        </div>
    </section>

    <!-- Flash Messages -->
    @if(session('success'))
        <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
            <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 0.75rem; padding: 1rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem; color: #059669;">
                    <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
            <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); border-radius: 0.75rem; padding: 1rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem; color: #dc2626;">
                    <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    <!-- Posts Content -->
    <main class="posts-container">
        @if($posts->count() > 0)
            <div class="posts-grid">
                @foreach($posts as $post)
                    <article class="post-card">
                        <a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: inherit;">
                            <!-- Post Image -->
                            @if($post->cover_image)
                                <img src="{{ asset('storage/'.$post->cover_image) }}" 
                                     alt="{{ $post->title }}" class="post-image">
                            @else
                                <div class="post-image" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem;">
                                    📖
                                </div>
                            @endif
                            
                            <div class="post-content">
                                <!-- Meta Info -->
                                <div class="post-meta">
                                    @if($post->arc)
                                        <span class="post-category" style="background: rgba(6, 182, 212, 0.1); color: var(--secondary);">
                                            {{ $post->arc->title }}
                                        </span>
                                    @endif
                                    <span class="post-date">{{ $post->created_at->format('M j, Y') }}</span>
                                    @if($post->privacy === 'private')
                                        <span class="post-category" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                                            🔒 Private
                                        </span>
                                    @endif
                                </div>
                                
                                <!-- Title -->
                                <h2 class="post-title line-clamp-2">{{ $post->title }}</h2>
                                
                                <!-- Excerpt -->
                                <p class="post-excerpt line-clamp-3">
                                    {{ Str::limit(strip_tags($post->body), 150) }}
                                </p>
                                
                                <!-- Footer -->
                                <div class="post-footer">
                                    <div class="post-author">
                                        <div class="author-avatar">
                                            {{ strtoupper(substr($post->user->name ?? 'A', 0, 1)) }}
                                        </div>
                                        <span class="author-name">{{ $post->user->name ?? 'Anonymous' }}</span>
                                    </div>
                                    
                                    <div class="post-stats">
                                        <span>❤️ {{ $post->reactions->count() }}</span>
                                        <span>💬 {{ $post->comments->count() }}</span>
                                        <span>👁️ {{ $post->views ?? rand(10, 500) }}</span>
                                    </div>
                                </div>
                                
                                <!-- Admin Actions -->
                                @if(Auth::user() && Auth::user()->is_admin)
                                    <div class="admin-actions" onclick="event.stopPropagation();">
                                        <a href="{{ route('posts.edit', $post) }}" class="admin-btn admin-btn-edit">
                                            ✏️ Edit
                                        </a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}" 
                                              onsubmit="return confirm('Are you sure you want to delete this post?')" 
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn-delete">
                                                🗑️ Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div style="display: flex; justify-content: center; margin-top: 3rem;">
                    {{ $posts->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-icon">📝</div>
                <h3>No Posts Yet</h3>
                <p>Be the first to share your thoughts and experiences with the community.</p>
                @if(Auth::user() && Auth::user()->is_admin)
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">
                        <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Write Your First Post
                    </a>
                @else
                    <a href="{{ route('home') }}" class="btn btn-secondary">
                        Explore Other Sections
                        <svg style="width: 1rem; height: 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                @endif
            </div>
        @endif
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        // Theme Toggle
        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                themeIcon.textContent = '🌙';
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                themeIcon.textContent = '☀️';
                localStorage.setItem('theme', 'dark');
            }
        }

        // Initialize theme
        function initTheme() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            
            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                html.classList.add('dark');
                themeIcon.textContent = '☀️';
            } else {
                html.classList.remove('dark');
                themeIcon.textContent = '🌙';
            }
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', initTheme);

        // Add scroll effect to navbar
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Animate post cards on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const postCards = document.querySelectorAll('.post-card');
            postCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        });
    </script>
</body>
</html>


