<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Story Arcs | {{ config('app.name', 'SoulVerse') }}</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="Explore narrative arcs and thematic collections of posts on Soulverse.">
    <meta name="keywords" content="story arcs, collections, narratives, blog series">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Story Arcs | SoulVerse">
    <meta property="og:description" content="Explore narrative arcs and thematic collections of posts">
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
            --container-padding: 1.5rem;
            
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
            padding: 1rem var(--container-padding);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.25rem;
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
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            position: relative;
            color: var(--gray-600);
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            padding: 0.5rem 0;
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
        
        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--gray-600);
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.375rem;
        }

        .dark .mobile-menu-btn {
            color: var(--gray-300);
        }

        .mobile-menu-btn:hover {
            background: var(--gray-100);
        }

        .dark .mobile-menu-btn:hover {
            background: var(--gray-800);
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
            padding: 1rem var(--container-padding);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .dark .mobile-menu {
            background: rgba(15, 23, 42, 0.98);
            border-top: 1px solid rgba(71, 85, 105, 0.2);
        }

        .mobile-menu.active {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mobile-nav {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .mobile-nav .nav-link {
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-200);
        }

        .dark .mobile-nav .nav-link {
            border-bottom: 1px solid var(--gray-700);
        }

        .mobile-nav .btn {
            justify-content: center;
            margin-top: 0.5rem;
        }

        /* Hero Section */
        .hero {
            position: relative;
            padding: 6rem var(--container-padding) 4rem;
            overflow: hidden;
            background: linear-gradient(135deg, 
                rgba(139, 92, 246, 0.1) 0%, 
                rgba(6, 182, 212, 0.05) 50%, 
                rgba(245, 158, 11, 0.1) 100%);
            text-align: center;
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
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 3s ease-in-out infinite alternate;
            background-size: 200% 200%;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        .hero-description {
            font-size: 1.25rem;
            color: var(--gray-600);
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.6;
        }

        .dark .hero-description {
            color: var(--gray-300);
        }

        .hero-cta {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Arc Card Styles */
        .card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid var(--gray-200);
        }

        .dark .card {
            background: var(--gray-800);
            border-color: var(--gray-700);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .dark .card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        /* Footer */
        .footer {
            background: var(--gray-900);
            color: var(--gray-300);
            padding: 3rem var(--container-padding) 2rem;
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

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: white;
            font-weight: 600;
        }

        .footer-section a {
            color: var(--gray-400);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .space-y-2 > * + * {
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero {
                padding: 4rem var(--container-padding) 3rem;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-description {
                font-size: 1rem;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>

<body class="antialiased">
    @include('layouts.navigation')
<!-- Main Content -->
<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Story Arcs</h1>
            <p class="hero-description">
                Discover thematic collections and narrative journeys through curated posts
            </p>
            @if(Auth::user() && Auth::user()->is_admin)
                <div class="hero-cta">
                    <a href="{{ route('arcs.create') }}" class="btn btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create New Arc
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Arcs Grid -->
    <section class="py-16 px-6 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            @if($arcs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                    @foreach($arcs as $arc)
                        <article class="card group">
                            <a href="{{ route('arcs.show', $arc) }}" class="block h-full text-inherit no-underline">
                                <div class="relative overflow-hidden">
                                    @if($arc->cover_image)
                                        <img src="{{ asset('storage/'.$arc->cover_image) }}" alt="{{ $arc->title }}" class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-primary to-secondary flex items-center justify-center">
                                            <span class="text-white text-4xl opacity-50">🧿</span>
                                        </div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                    @endif
                                    
                                    <!-- Post Count Badge -->
                                    <div class="absolute top-4 right-4 bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-full px-3 py-1 text-sm font-medium text-gray-800 dark:text-gray-200 shadow-md">
                                        {{ $arc->posts_count ?? 0 }} {{ Str::plural('post', $arc->posts_count ?? 0) }}
                                    </div>
                                </div>
                                
                                <div class="p-6">
                                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white transition-colors duration-300 group-hover:text-primary dark:group-hover:text-primary">
                                        {{ $arc->title }}
                                    </h3>
                                    
                                    @if($arc->description)
                                        <p class="text-gray-600 dark:text-gray-300 mb-4 text-sm leading-relaxed line-clamp-3">
                                            {{ $arc->description }}
                                        </p>
                                    @endif
                                    
                                    <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                                        <span>Last updated: {{ $arc->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <svg class="w-24 h-24 mx-auto mb-6 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">No Story Arcs Yet</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Story arcs help organize posts into thematic collections and narrative journeys.
                        </p>
                        @if(Auth::user() && Auth::user()->is_admin)
                            <a href="{{ route('arcs.create') }}" class="btn btn-primary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Create First Arc
                            </a>
                        @else
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                                Browse Posts Instead
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
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
        if (!menu.contains(event.target) && !button.contains(event.target)) {
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
            document.getElementById('mobileMenu').classList.remove('active');
            document.getElementById('mobileMenu').style.display = 'none';
        }
    }
    window.addEventListener('resize', handleNavbarResponsive);
    document.addEventListener('DOMContentLoaded', handleNavbarResponsive);

    // Theme Toggle
    function toggleTheme() {
        const html = document.documentElement;
        const themeIcon = document.getElementById('theme-icon');
        const mobileThemeIcon = document.getElementById('mobile-theme-icon');
        
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            themeIcon.textContent = '🌙';
            if (mobileThemeIcon) mobileThemeIcon.textContent = '🌙';
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            themeIcon.textContent = '☀️';
            if (mobileThemeIcon) mobileThemeIcon.textContent = '☀️';
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
            if (mobileThemeIcon) mobileThemeIcon.textContent = '☀️';
        } else {
            html.classList.remove('dark');
            themeIcon.textContent = '🌙';
            if (mobileThemeIcon) mobileThemeIcon.textContent = '🌙';
        }
    }

    // Initialize on load
    document.addEventListener('DOMContentLoaded', initTheme);
</script>
</body>
</html>


