<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Dashboard | {{ config('app.name', 'SoulVerse') }}</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="Your personal dashboard on SoulVerse - manage your posts, view analytics, and create new content.">
    <meta name="keywords" content="dashboard, blog, stories, writing, creative writing, community, social media">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Dashboard | SoulVerse">
    <meta property="og:description" content="Manage your posts, view analytics, and create new content">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/dashboard') }}">
    
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
<style>
        /* Dashboard Specific Styles */
        .dashboard-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .dashboard-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,300 1000,1000 0,700"/></svg>') no-repeat center;
            background-size: cover;
        }

        .dashboard-hero-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
            position: relative;
            z-index: 10;
        }

        .dashboard-title {
            font-family: var(--font-serif);
            font-size: 3rem;
            font-weight: 700;
            margin: 0 0 1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .dashboard-subtitle {
            font-size: 1.125rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        @media (max-width: 768px) {
            .actions-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
                margin-bottom: 3rem;
            }
        }

        @media (max-width: 480px) {
            .actions-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
                margin-bottom: 2rem;
            }
        }

        .action-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--gray-200);
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dark .action-card {
            background: var(--gray-800);
            border-color: var(--gray-700);
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(6, 182, 212, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .action-card:hover::before {
            opacity: 1;
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .action-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 10;
        }

        .action-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0 0 0.5rem;
            color: var(--gray-800);
            position: relative;
            z-index: 10;
        }

        .dark .action-title {
            color: var(--gray-100);
        }

        .action-description {
            color: var(--gray-600);
            font-size: 0.875rem;
            line-height: 1.5;
            margin: 0;
            position: relative;
            z-index: 10;
        }

        .dark .action-description {
            color: var(--gray-400);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
            align-items: start;
        }

        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 480px) {
            .content-grid {
                gap: 1.5rem;
            }
        }

        .content-section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--gray-200);
        }

        .dark .content-section {
            background: var(--gray-800);
            border-color: var(--gray-700);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            color: var(--gray-800);
        }

        .dark .section-title {
            color: var(--gray-100);
        }

        .section-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .section-link:hover {
            color: var(--primary-dark);
        }

        .post-item {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .dark .post-item {
            border-bottom-color: var(--gray-700);
        }

        .post-item:last-child {
            border-bottom: none;
        }

        .post-item:hover {
            background: var(--gray-50);
            margin: 0 -2rem;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .dark .post-item:hover {
            background: var(--gray-700);
        }

        .post-title {
            font-weight: 600;
            margin: 0 0 0.5rem;
            color: var(--gray-800);
        }

        .dark .post-title {
            color: var(--gray-100);
        }

        .post-meta {
            color: var(--gray-500);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .dark .post-meta {
            color: var(--gray-400);
        }

        .stats-grid {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }
        }

        .stat-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 1rem;
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 0.5rem;
        }

        .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-title {
                font-size: 2rem;
            }

            .main-content {
                padding: 2rem 1rem;
            }
            
            .content-section {
                padding: 1.5rem;
            }
            
            .action-card {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .dashboard-title {
                font-size: 1.75rem;
            }
            
            .dashboard-subtitle {
                font-size: 0.9rem;
            }

            .main-content {
                padding: 1.5rem 0.75rem;
            }
            
            .content-section {
                padding: 1rem;
            }
            
            .action-card {
                padding: 1rem;
            }
            
            .section-title {
                font-size: 1.25rem;
            }
            
            .action-icon {
                width: 3rem;
                height: 3rem;
                font-size: 1.25rem;
            }
            
            .action-title {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
@include('layouts.navigation')
 
<section class="dashboard-hero">
    <div class="dashboard-hero-content">
        <h1 class="dashboard-title">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="dashboard-subtitle">
            Ready to share your next story or manage your content? Your creative journey continues here.
        </p>
    </div>
</section>

<!-- Main Content -->
<main class="main-content">
    <!-- Quick Actions Grid -->
    <div class="actions-grid">
        @if(Auth::user()->is_admin)
            <a href="{{ route('posts.create') }}" class="action-card">
                <div class="action-icon" style="background: linear-gradient(135deg, var(--success) 0%, #059669 100%);">
                    ✍️
                </div>
                <h3 class="action-title">Write New Post</h3>
                <p class="action-description">Share your next story, insight, or creative piece with the community</p>
            </a>
        @endif

        <a href="{{ route('posts.index') }}" class="action-card">
            <div class="action-icon" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
                📚
            </div>
            <h3 class="action-title">Browse Posts</h3>
            <p class="action-description">Explore all posts, manage your content, and discover new stories</p>
        </a>

        <a href="{{ route('arcs.index') }}" class="action-card">
            <div class="action-icon" style="background: linear-gradient(135deg, var(--secondary) 0%, #0891b2 100%);">
                🌟
            </div>
            <h3 class="action-title">Story Arcs</h3>
            <p class="action-description">Explore collections of related stories and narrative journeys</p>
        </a>

        <a href="{{ route('profile.edit') }}" class="action-card">
            <div class="action-icon" style="background: linear-gradient(135deg, var(--accent) 0%, #d97706 100%);">
                👤
            </div>
            <h3 class="action-title">Edit Profile</h3>
            <p class="action-description">Update your information, avatar, and bio settings</p>
        </a>
    </div>

    <!-- Content Overview -->
    <div class="content-grid">
        <!-- Recent Posts -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Your Recent Activity</h2>
                <a href="{{ route('posts.index') }}" class="section-link">
                    View All Posts →
                </a>
            </div>

            @if($recentPosts->count() > 0)
                @foreach($recentPosts as $post)
                    <article class="post-item">
                        <h3 class="post-title">
                            <a href="{{ route('posts.show', $post) }}" style="color: inherit; text-decoration: none;">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <div class="post-meta">
                            <span>{{ $post->created_at->format('M j, Y') }}</span>
                            <span>{{ $post->reactions_count ?? 0 }} reactions</span>
                            <span>{{ $post->comments_count ?? 0 }} comments</span>
                        </div>
                    </article>
                @endforeach
            @else
                <div style="text-align: center; padding: 3rem 0; color: var(--gray-500);">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📝</div>
                    <h3 style="margin: 0 0 0.5rem; color: var(--gray-700);">No posts yet</h3>
                    <p style="margin: 0;">Start writing your first story!</p>
                </div>
            @endif
        </div>

        <!-- Quick Stats -->
        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">Your Stats</h2>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">{{ $totalPosts ?? 0 }}</div>
                    <div class="stat-label">Total Posts</div>
                </div>

                <div class="stat-card" style="background: linear-gradient(135deg, var(--secondary) 0%, #0891b2 100%);">
                    <div class="stat-number">{{ $totalReactions ?? 0 }}</div>
                    <div class="stat-label">Total Reactions</div>
                </div>

                <div class="stat-card" style="background: linear-gradient(135deg, var(--accent) 0%, #d97706 100%);">
                    <div class="stat-number">{{ $totalComments ?? 0 }}</div>
                    <div class="stat-label">Total Comments</div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
@include('layouts.footer')

<script>
    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('active');
        if (menu.classList.contains('active')) {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none';
        }
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('mobileMenu');
        const button = document.querySelector('.mobile-menu-btn');
        if (menu && button && !menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.remove('active');
            menu.style.display = 'none';
        }
    });

    // Responsive navbar: show/hide nav-links and mobile-menu-btn
    function handleNavbarResponsive() {
        const navLinks = document.querySelector('.navbar-nav');
        const mobileBtn = document.querySelector('.mobile-menu-btn');
        if (window.innerWidth <= 768) {
            navLinks.style.display = 'none';
            mobileBtn.style.display = 'block';
        } else {
            navLinks.style.display = 'flex';
            mobileBtn.style.display = 'none';
            const menu = document.getElementById('mobileMenu');
            if (menu) {
                menu.classList.remove('active');
                menu.style.display = 'none';
            }
        }
    }

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

    window.addEventListener('resize', handleNavbarResponsive);
    document.addEventListener('DOMContentLoaded', function() {
        handleNavbarResponsive();
        initTheme();
    });
    
</script>
</body>
</html>
    

  
</script>
</body>
</html>


