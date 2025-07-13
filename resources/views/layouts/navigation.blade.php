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
            background:var(--gray-50);
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
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-button {
                display: flex;
            }
        }

        @media (min-width: 800px) and (max-width: 1024px) {
               .theme-toggle {
                margin-bottom: 1.5rem;
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
            padding: 1rem;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 1.2rem;
            transition: all 0.3s ease;
            opacity: 0;
        }

  .nav-links {
                display: none;
            }

            .mobile-menu-button {
                display: flex;
            }
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

        /* Auth Form Styles */
        .auth-container {
            min-height: calc(100vh - 300px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .auth-card {
            max-width: 500px;
            width: 100%;
            background: white;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(226, 232, 240, 0.5);
            transition: all 0.3s ease;
        }

        .dark .auth-card {
            background: var(--gray-800);
            border: 1px solid rgba(51, 65, 85, 0.5);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .dark .auth-title {
            color: var(--gray-100);
        }

        .auth-subtitle {
            color: var(--gray-500);
            font-size: 0.95rem;
        }

        .dark .auth-subtitle {
            color: var(--gray-400);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--gray-700);
            font-size: 0.9rem;
        }

        .dark .form-label {
            color: var(--gray-300);
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            background: white;
            color: var(--gray-800);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .dark .form-input {
            background: var(--gray-700);
            border-color: var(--gray-600);
            color: var(--gray-100);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
        }

        .form-error {
            color: var(--error);
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .dark .auth-footer {
            color: var(--gray-400);
        }

        .auth-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .auth-link:hover {
            text-decoration: underline;
        }
    </style>

<nav class="navbar">
    <div class="navbar-content">
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon">🧿</span>
            <span>SoulVerse</span>
        </a>
        
        <div class="nav-links">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">Explore</a>
            <a href="{{ route('arcs.index') }}" class="nav-link {{ request()->routeIs('arcs.index') ? 'active' : '' }}">Story Arcs</a>
            
            @auth
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                @if(Auth::user()->is_admin)
                    <a href="{{ route('arcs.create') }}" class="nav-link {{ request()->routeIs('arcs.create') ? 'active' : '' }}">New Arc</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Write</a>
            @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
            @endauth
            
            <button onclick="toggleTheme()" class="theme-toggle" id="theme-icon" aria-label="Toggle theme">🌙</button>
        </div>
        
        <button class="mobile-menu-button" aria-label="Open menu">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6" style="width: 1.5rem; height: 1.5rem;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
</nav>

<div class="mobile-menu">
    <button class="mobile-close" aria-label="Close menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6" style="width: 1.5rem; height: 1.5rem;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
    <a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}">Explore</a>
    <a href="{{ route('arcs.index') }}" class="nav-link {{ request()->routeIs('arcs.index') ? 'active' : '' }}">Story Arcs</a>
    
    @auth
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('posts.create') }}" class="nav-link">Write</a>
        @if(Auth::user()->is_admin)
            <a href="{{ route('arcs.create') }}" class="nav-link">New Arc</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); this.closest('form').submit();">
                Logout
            </a>
        </form>
    @else
        <a href="{{ route('login') }}" class="nav-link">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary" style="margin-top: 1rem; width: 100%;">Sign Up</a>
    @endauth
    
    <button onclick="toggleTheme()" class="theme-toggle" id="mobile-theme-icon" aria-label="Toggle theme" style="margin-top: 2rem;">🌙</button>
</div>


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

        // Hide/reveal navbar on scroll (global)
        let lastScrollTop = 0;
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
