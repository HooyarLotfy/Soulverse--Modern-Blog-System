<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $arc->title }} | SoulVerse</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="{{ Str::limit(strip_tags($arc->description), 150) }}">
    <meta name="keywords" content="blog, stories, writing, creative writing, community, social media, story arc">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $arc->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($arc->description), 150) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($arc->cover_image)
        <meta property="og:image" content="{{ asset('storage/' . $arc->cover_image) }}">
    @endif
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $arc->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($arc->description), 150) }}">
    @if($arc->cover_image)
        <meta name="twitter:image" content="{{ asset('storage/' . $arc->cover_image) }}">
    @endif
    
    <link rel="canonical" href="{{ url()->current() }}">
    
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
            background: rgba(226, 232, 240, 0.5);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .dark .btn-secondary {
            background: rgba(30, 41, 59, 0.5);
            color: var(--gray-300);
            border: 1px solid var(--gray-700);
        }

        .btn-secondary:hover {
            background: rgba(226, 232, 240, 0.8);
            transform: translateY(-2px);
        }

        .dark .btn-secondary:hover {
            background: rgba(30, 41, 59, 0.8);
        }

        /* Theme Toggle Button */
        .theme-toggle {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            margin-left: 1rem;
            opacity: 0.8;
            transition: all 0.3s ease;
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--gray-100);
        }

        .dark .theme-toggle {
            background: var(--gray-800);
        }

        .theme-toggle:hover {
            opacity: 1;
            transform: rotate(15deg) scale(1.1);
        }

        /* Mobile Nav */
        .mobile-menu-button {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            color: var(--gray-700);
            font-size: 1.5rem;
        }

        .dark .mobile-menu-button {
            color: var(--gray-300);
        }

        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            z-index: 100;
            padding: 2rem;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(-20px);
        }

        .dark .mobile-menu {
            background: rgba(15, 23, 42, 0.95);
        }

        .mobile-menu.active {
            display: flex;
            opacity: 1;
            transform: translateY(0);
        }

        .mobile-menu .nav-link {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .mobile-close {
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: none;
            border: none;
            color: var(--gray-700);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .dark .mobile-close {
            color: var(--gray-300);
        }

        /* Media Queries */
        @media (max-width: 1023.98px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-button {
                display: flex;
            }
        }

        /* Arc Page Styles */
        .arc-hero {
            text-align: center;
            padding: 4rem 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .arc-title {
            font-family: var(--font-serif);
            font-size: 3rem;
            font-weight: 800;
            color: var(--gray-800);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .dark .arc-title {
            color: var(--gray-100);
        }

        .arc-subtitle {
            font-size: 1.1rem;
            color: var(--gray-600);
            max-width: 700px;
            margin: 0 auto 2rem;
        }

        .dark .arc-subtitle {
            color: var(--gray-400);
        }

        .arc-cover {
            max-width: 100%;
            height: auto;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            margin: 0 auto 2rem;
            display: block;
        }

        .arc-admin-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 2rem 0;
        }

        .arc-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .arc-section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .dark .arc-section-title {
            color: var(--gray-100);
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .post-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(226, 232, 240, 0.5);
            height: 100%;
        }

        .dark .post-card {
            background: var(--gray-800);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .post-content {
            padding: 1.5rem;
        }

        .post-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .dark .post-title {
            color: var(--gray-100);
        }

        .post-date {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin-bottom: 1rem;
        }

        .dark .post-date {
            color: var(--gray-400);
        }

        .post-excerpt {
            color: var(--gray-600);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .dark .post-excerpt {
            color: var(--gray-300);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 1rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.5);
            grid-column: 1 / -1;
        }

        .dark .empty-state {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }

        /* Footer */
        .footer {
            background: rgba(241, 245, 249, 0.7);
            padding: 4rem 2rem 2rem;
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(203, 213, 225, 0.3);
            margin-top: 4rem;
        }

        .dark .footer {
            background: rgba(15, 23, 42, 0.7);
            border-top: 1px solid rgba(51, 65, 85, 0.3);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--gray-800);
            margin-bottom: 1.5rem;
        }

        .dark .footer-logo {
            color: var(--gray-200);
        }

        .footer-text {
            max-width: 600px;
            margin-bottom: 2rem;
            color: var(--gray-600);
        }

        .dark .footer-text {
            color: var(--gray-400);
        }

        .footer-links {
            display: flex;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .footer-link {
            color: var(--gray-600);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dark .footer-link {
            color: var(--gray-400);
        }

        .footer-link:hover {
            color: var(--primary);
        }

        .footer-bottom {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .dark .footer-bottom {
            color: var(--gray-500);
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    @include('layouts.navigation')
      
            
            <button class="mobile-menu-button" aria-label="Open menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <button class="mobile-close" aria-label="Close menu">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        
        <a href="{{ route('posts.index') }}" class="nav-link">Explore</a>
        <a href="{{ route('arcs.index') }}" class="nav-link">Story Arcs</a>
        <a href="javascript:void(0);" class="nav-link">About</a>
        @auth
            <a href="{{ route('posts.create') }}" class="nav-link">Write</a>
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="nav-link">Login</a>
            <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
        @endauth
        <button onclick="toggleTheme()" class="theme-toggle" id="mobile-theme-icon" aria-label="Toggle theme">🌙</button>
    </div>

    <!-- Main Content -->
    <main>
        <!-- Arc Hero Section -->
        <section class="arc-hero">
            <h1 class="arc-title">{{ $arc->title }}</h1>
            <div class="arc-subtitle">Arc details and all posts in this arc.</div>
            
            @if($arc->cover_image)
                <img src="{{ asset('storage/'.$arc->cover_image) }}" class="arc-cover" alt="{{ $arc->title }} cover image">
            @endif
            
            @if(Auth::user() && Auth::user()->is_admin)
                <div class="arc-admin-actions">
                    <a href="{{ route('arcs.edit', $arc) }}" class="btn btn-secondary">Edit Arc</a>
                    <form method="POST" action="{{ route('arcs.destroy', $arc) }}" onsubmit="return confirm('Are you sure you want to delete this arc? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #ef4444, #b91c1c);">Delete Arc</button>
                    </form>
                </div>
            @endif
        </section>
        
        <!-- Arc Posts Section -->
        <section class="arc-content">
            <h2 class="arc-section-title">Posts in this Arc</h2>
            
            <div class="posts-grid">
                @forelse($arc->posts as $post)
                    <a href="{{ route('posts.show', $post) }}" class="post-card">
                        <div class="post-content">
                            <h3 class="post-title">{{ $post->title }}</h3>
                            <div class="post-date">{{ $post->created_at->format('M d, Y') }}</div>
                            <div class="post-excerpt">{{ Str::limit(strip_tags($post->body), 120) }}</div>
                        </div>
                    </a>
                @empty
                    <div class="empty-state">
                        <div style="font-size: 3rem; margin-bottom: 1rem;">📝</div>
                        <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem;">No posts in this arc yet</h3>
                        <p style="color: var(--gray-600); margin-bottom: 1.5rem;" class="dark:text-gray-400">This story arc doesn't have any posts yet.</p>
                        @auth
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create a Post</a>
                        @endauth
                    </div>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        // Theme Toggle
        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const mobileThemeIcon = document.getElementById('mobile-theme-icon');
            
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                themeIcon.textContent = '🌙';
                mobileThemeIcon.textContent = '🌙';
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                themeIcon.textContent = '☀️';
                mobileThemeIcon.textContent = '☀️';
                localStorage.setItem('theme', 'dark');
            }
        }

        // Initialize theme
        function initTheme() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const mobileThemeIcon = document.getElementById('mobile-theme-icon');
            
            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                html.classList.add('dark');
                themeIcon.textContent = '☀️';
                mobileThemeIcon.textContent = '☀️';
            } else {
                html.classList.remove('dark');
                themeIcon.textContent = '🌙';
                mobileThemeIcon.textContent = '🌙';
            }
        }

        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileCloseButton = document.querySelector('.mobile-close');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
            
            mobileCloseButton.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            });

            // Initialize theme
            initTheme();
        });
    </script>
</body>
</html>


