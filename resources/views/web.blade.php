<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'SoulVerse') }} - Where Stories Come Alive</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="SoulVerse is a modern blogging platform where writers share their stories, insights, and creativity. Discover amazing content from talented creators.">
    <meta name="keywords" content="blog, stories, writing, creative writing, community, social media">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="SoulVerse - Where Stories Come Alive">
    <meta property="og:description" content="A modern blogging platform for creative writers and storytellers">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    
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
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--gray-800);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dark .logo {
            color: var(--gray-100);
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            font-size: 2rem;
            filter: drop-shadow(0 4px 8px rgba(139, 92, 246, 0.3));
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            position: relative;
            color: var(--gray-500);
            font-weight: 500;
            text-decoration: none;
            padding: 0.75rem 0;
            transition: all 0.3s ease;
        }

        .dark .nav-link {
            color: var(--gray-400);
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
            background: transparent;
            color: var(--gray-600);
            border: 1px solid var(--gray-300);
        }

        .dark .btn-secondary {
            color: var(--gray-300);
            border-color: var(--gray-600);
        }

        .btn-secondary:hover {
            background: rgba(139, 92, 246, 0.1);
            border-color: var(--primary);
            color: var(--primary);
        }

        .theme-toggle {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.75rem;
            background: var(--gray-100);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dark .theme-toggle {
            background: var(--gray-800);
            border-color: var(--gray-700);
        }

        .theme-toggle:hover {
            background: rgba(139, 92, 246, 0.1);
            border-color: var(--primary);
            transform: scale(1.1);
        }

        /* Hero Section */
        .hero {
            position: relative;
            padding: 6rem 1.5rem 4rem;
            overflow: hidden;
            background: linear-gradient(135deg, 
                rgba(139, 92, 246, 0.1) 0%, 
                rgba(6, 182, 212, 0.05) 50%, 
                rgba(245, 158, 11, 0.1) 100%);
        }

        .dark .hero {
            background: linear-gradient(135deg, 
                rgba(139, 92, 246, 0.2) 0%, 
                rgba(6, 182, 212, 0.1) 50%, 
                rgba(245, 158, 11, 0.15) 100%);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(139, 92, 246, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(6, 182, 212, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(245, 158, 11, 0.2) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
        }

        .hero-title {
            font-family: var(--font-serif);
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 3s ease-in-out infinite alternate;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .dark .hero-subtitle {
            color: var(--gray-300);
        }

        .hero-cta {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }

        .hero-stats {
            display: flex;
            gap: 3rem;
            justify-content: center;
            margin-top: 3rem;
            flex-wrap: wrap;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            display: block;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .dark .stat-label {
            color: var(--gray-400);
        }

        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-family: var(--font-serif);
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 1rem;
        }

        .dark .section-title {
            color: var(--gray-100);
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
        }

        .dark .section-subtitle {
            color: var(--gray-300);
        }

        /* Grid Layout */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
            margin-top: 4rem;
        }

        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Posts Section */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .post-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--gray-200);
        }

        .dark .post-card {
            background: var(--gray-800);
            border-color: var(--gray-700);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        .post-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .dark .post-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.4);
        }

        .post-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
        }

        .post-content {
            padding: 1.5rem;
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .dark .post-meta {
            color: var(--gray-400);
        }

        .post-category {
            background: rgba(139, 92, 246, 0.1);
            color: var(--primary);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .post-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .dark .post-title {
            color: var(--gray-100);
        }

        .post-excerpt {
            color: var(--gray-600);
            line-height: 1.6;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .dark .post-excerpt {
            color: var(--gray-300);
        }

        .post-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .dark .post-footer {
            border-color: var(--gray-700);
        }

        .post-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .author-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .author-name {
            font-weight: 500;
            color: var(--gray-700);
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

        .dark .post-stats {
            color: var(--gray-400);
        }

        /* Comments Sidebar */
        .comments-sidebar {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--gray-200);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .dark .comments-sidebar {
            background: var(--gray-800);
            border-color: var(--gray-700);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        .sidebar-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dark .sidebar-title {
            color: var(--gray-100);
        }

        .comment-item {
            padding: 1rem 0;
            border-bottom: 1px solid var(--gray-200);
        }

        .dark .comment-item {
            border-color: var(--gray-700);
        }

        .comment-item:last-child {
            border-bottom: none;
        }

        .comment-author {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .comment-avatar {
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 9999px;
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .comment-name {
            font-weight: 500;
            color: var(--gray-700);
            font-size: 0.875rem;
        }

        .dark .comment-name {
            color: var(--gray-300);
        }

        .comment-time {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .dark .comment-time {
            color: var(--gray-400);
        }

        .comment-text {
            font-size: 0.875rem;
            color: var(--gray-600);
            line-height: 1.5;
            margin-bottom: 0.5rem;
        }

        .dark .comment-text {
            color: var(--gray-300);
        }

        .comment-post {
            font-size: 0.75rem;
            color: var(--gray-500);
            font-style: italic;
        }

        .dark .comment-post {
            color: var(--gray-400);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .navbar-content {
                padding: 1rem;
            }

            .nav-links {
                display: none;
            }

            .hero {
                padding: 4rem 1rem 3rem;
            }

            .hero-cta {
                flex-direction: column;
                align-items: center;
            }

            .hero-stats {
                gap: 2rem;
            }

            .main-content {
                padding: 3rem 1rem;
            }

            .posts-grid {
                grid-template-columns: 1fr;
            }

            .comments-sidebar {
                position: static;
            }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--gray-500);
        }

        .dark .empty-state {
            color: var(--gray-400);
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        /* Footer */
        .footer {
            background: var(--gray-900);
            color: var(--gray-300);
            padding: 3rem 1.5rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .footer-text {
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .footer-link {
            color: var(--gray-400);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-800);
            padding-top: 2rem;
            font-size: 0.875rem;
            opacity: 0.6;
        }
    </style>
</head>

<body>@include('layouts.navigation')
          <div class="navbar-content">
        <a href="{{ url('/') }}" class="navbar-brand" style="display: flex; align-items: center; gap: 0.5rem; font-size: 1.25rem; font-weight: 800; color: var(--primary); text-decoration: none; transition: all 0.3s ease;">
            <span class="icon" style="font-size: 1.5rem;">🧿</span>
            <span>SoulVerse</span>
        </a>
        <ul class="navbar-nav" style="display: flex; align-items: center; gap: 1.5rem; list-style: none; margin: 0; padding: 0;">
            <li><a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" style="color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem; transition: all 0.3s ease; position: relative; padding: 0.5rem 0;">Home</a></li>
            <li><a href="{{ route('posts.index') }}" class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" style="color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem; transition: all 0.3s ease; position: relative; padding: 0.5rem 0;">Posts</a></li>
            <li><a href="{{ route('arcs.index') }}" class="nav-link {{ request()->is('arcs*') ? 'active' : '' }}" style="color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem; transition: all 0.3s ease; position: relative; padding: 0.5rem 0;">Arcs</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" style="color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem; transition: all 0.3s ease; position: relative; padding: 0.5rem 0;">Dashboard</a></li>
                <li>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white; box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);">
                        <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Write
                    </a>
                </li>
            @else                <li><a href="{{ route('register') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white; box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);">Join</a></li>
                <li><a href="{{ route('login') }}" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: all 0.3s ease; border: 1px solid var(--gray-300); background: transparent; color: var(--gray-600);">Login</a></li>
                <li>
                    <button onclick="toggleTheme()" class="theme-toggle">
                        <span id="theme-icon">🌙</span>
                    </button>
                </li>
            @endauth
        </ul>
        <button class="mobile-menu-btn" onclick="toggleMobileMenu()" style="display: none; background: none; border: none; color: var(--gray-600); cursor: pointer; padding: 0.5rem; border-radius: 0.375rem;">
            <svg class="icon-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
    
</nav>


    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Where Stories Come Alive</h1>
            <p class="hero-subtitle">
                SoulVerse is a modern blogging platform where writers share their stories, insights, and creativity. 
                Join our community of passionate storytellers and discover amazing content.
            </p>
            
            <div class="hero-cta">
                @auth
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Start Writing</a>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Explore Posts</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary">Join the Community</a>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Explore Posts</a>
                @endauth
            </div>
            
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">{{ $posts->count() }}</span>
                    <span class="stat-label">Stories</span>
                </div>
                <div class="stat">
                    <span class="stat-number">{{ $comments->count() }}</span>
                    <span class="stat-label">Comments</span>
                </div>
                <div class="stat">
                    <span class="stat-number">∞</span>
                    <span class="stat-label">Possibilities</span>
                </div>
            </div>
        </div>
    </section>    <!-- Main Content -->
    <main class="main-content">
        <div class="section-header">
            <h2 class="section-title">Latest Stories & Conversations</h2>
            <p class="section-subtitle">Discover the most recent posts and join the ongoing discussions in our vibrant community</p>
        </div>

        <!-- Recent Posts -->
        <section class="posts-section" style="margin-bottom: 4rem;">
            <div class="posts-grid">
                @forelse($posts as $post)
                    <article class="post-card">
                        @if($post->cover_image)
                            <img src="{{ asset('storage/' . $post->cover_image) }}" alt="{{ $post->title }}" class="post-image">
                        @else
                            <div class="post-image" style="background: linear-gradient(135deg, 
                                {{ ['#8b5cf6', '#06b6d4', '#f59e0b', '#10b981', '#ef4444'][array_rand(['#8b5cf6', '#06b6d4', '#f59e0b', '#10b981', '#ef4444'])] }} 0%, 
                                {{ ['#7c3aed', '#0891b2', '#d97706', '#059669', '#dc2626'][array_rand(['#7c3aed', '#0891b2', '#d97706', '#059669', '#dc2626'])] }} 100%); 
                                display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                📖
                            </div>
                        @endif
                        
                        <div class="post-content">
                            <div class="post-meta">
                                @if($post->category)
                                    <span class="post-category">{{ $post->category }}</span>
                                @endif
                                @if($post->arc)
                                    <span class="post-category" style="background: rgba(6, 182, 212, 0.1); color: var(--secondary);">
                                        {{ $post->arc->title }}
                                    </span>
                                @endif
                                <span>{{ $post->created_at->format('M j, Y') }}</span>
                            </div>
                            
                            <h3 class="post-title">
                                <a href="{{ route('posts.show', $post) }}" style="text-decoration: none; color: inherit;">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            
                            <p class="post-excerpt">
                                {{ Str::limit(strip_tags($post->body), 150) }}
                            </p>
                            
                            <div class="post-footer">
                                <div class="post-author">
                                    <div class="author-avatar">
                                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                    </div>
                                    <span class="author-name">{{ $post->user->name }}</span>
                                </div>
                                
                                <div class="post-stats">
                                    <span>💬 {{ $post->comments->count() }}</span>
                                    <span>👁️ {{ rand(10, 500) }}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">📝</div>
                        <h3>No posts yet</h3>
                        <p>Be the first to share your story!</p>
                        @auth
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create First Post</a>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-primary">Join to Write</a>
                        @endauth
                    </div>
                @endforelse
            </div>
            
            @if($posts->count() > 0)
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">View All Posts</a>
                </div>
            @endif
        </section>

        <!-- Recent Comments Section -->
        <section class="comments-section" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
                <h2 class="section-title">💬 Latest Comments</h2>
                <p class="section-subtitle">Join the ongoing conversations and see what the community is discussing</p>
            </div>
            
            <div class="comments-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                @forelse($comments as $comment)
                    <div class="comment-card" style="background: rgba(255, 255, 255, 0.9); border-radius: 1rem; padding: 1.5rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); transition: all 0.3s ease; cursor: pointer;" 
                         onclick="window.location.href='{{ route('posts.show', $comment->post) }}'">
                        <div class="comment-author" style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                            @if($comment->user->avatar)
                                <div class="comment-avatar" style="width: 3rem; height: 3rem; border-radius: 50%; overflow: hidden; position: relative;">
                                    <img src="{{ asset('storage/'.$comment->user->avatar) . '?v=' . $comment->user->updated_at->timestamp }}" 
                                         alt="{{ $comment->user->name }}"
                                         class="w-full h-full object-cover"
                                         data-avatar-user="{{ $comment->user->id }}"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="comment-avatar-fallback" style="position: absolute; top: 0; left: 0; width: 3rem; height: 3rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); border-radius: 50%; display: none; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 1.1rem;"
                                         data-avatar-user="{{ $comment->user->id }}">
                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                    </div>
                                </div>
                            @else
                                <div class="comment-avatar" style="width: 3rem; height: 3rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 1.1rem;"
                                     data-avatar-user="{{ $comment->user->id }}">
                                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <div class="comment-name" style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.25rem;">{{ $comment->user->name }}</div>
                                <div class="comment-time" style="font-size: 0.875rem; color: var(--gray-500);">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        
                        <p class="comment-text" style="color: var(--gray-700); line-height: 1.6; margin-bottom: 1rem; font-size: 0.95rem;">
                            "{{ Str::limit($comment->body, 120) }}"
                        </p>
                        
                        <p class="comment-post" style="font-size: 0.875rem; color: var(--gray-600); border-top: 1px solid rgba(148, 163, 184, 0.2); padding-top: 0.75rem; margin-top: 1rem;">
                            Commented on <span style="color: var(--primary); font-weight: 500;">"{{ Str::limit($comment->post->title, 40) }}"</span>
                        </p>
                    </div>
                @empty
                    <div class="empty-state" style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                        <div class="empty-icon" style="font-size: 4rem; margin-bottom: 1rem;">💭</div>
                        <h4 style="font-size: 1.5rem; font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;">No comments yet</h4>
                        <p style="color: var(--gray-600); margin-bottom: 2rem;">Be the first to join the conversation!</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">Start Discussing</a>
                    </div>
                @endforelse
            </div>
            
            @if($comments->count() > 0)
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">View All Discussions</a>
                </div>
            @endif
        </section>
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

        // Observe post cards for animation
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
           
