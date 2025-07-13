<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'SoulVerse') }} - Profile Settings</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="SoulVerse is a modern blogging platform where writers share their stories, insights, and creativity. Discover amazing content from talented creators.">
    <meta name="keywords" content="blog, stories, writing, creative writing, community, social media">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="SoulVerse - Profile Settings">
    <meta property="og:description" content="Manage your SoulVerse profile settings">
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

        /* Settings Section */
        .settings-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .dark .settings-container {
            background: rgba(30, 41, 59, 0.8);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .settings-header {
            margin-bottom: 2rem;
        }

        .settings-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .dark .settings-title {
            color: var(--gray-100);
        }

        .settings-subtitle {
            color: var(--gray-500);
            font-size: 1rem;
        }

        .dark .settings-subtitle {
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
        }

        .dark .form-label {
            color: var(--gray-300);
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid var(--gray-300);
            background: white;
            color: var(--gray-800);
            transition: all 0.3s ease;
        }

        .dark .form-input {
            background: var(--gray-800);
            border-color: var(--gray-700);
            color: var(--gray-200);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .success-message {
            color: var(--success);
            font-weight: 500;
        }

        .dark .success-message {
            color: #34d399;
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
    </style>
</head>

<body>
@include('layouts.navigation')
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
                <li>
                    <button onclick="toggleTheme()" class="theme-toggle">
                        <span id="theme-icon">🌙</span>
                    </button>
                </li>
            @else
                <li><a href="{{ route('register') }}" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white; box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);">Join</a></li>
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
    <div class="mobile-menu" id="mobileMenu" style="display: none; position: absolute; top: 100%; left: 0; right: 0; background: rgba(255, 255, 255, 0.98); backdrop-filter: blur(20px); border-top: 1px solid rgba(148, 163, 184, 0.1); padding: 1rem 1.5rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);">
        <div class="mobile-nav" style="display: flex; flex-direction: column; gap: 0.75rem;">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" style="padding: 0.75rem 0; border-bottom: 1px solid var(--gray-200); color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem;">Home</a>
            <a href="{{ route('posts.index') }}" class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" style="padding: 0.75rem 0; border-bottom: 1px solid var(--gray-200); color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem;">Posts</a>
            <a href="{{ route('arcs.index') }}" class="nav-link {{ request()->is('arcs*') ? 'active' : '' }}" style="padding: 0.75rem 0; border-bottom: 1px solid var(--gray-200); color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem;">Arcs</a>
            @auth
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" style="padding: 0.75rem 0; border-bottom: 1px solid var(--gray-200); color: var(--gray-600); text-decoration: none; font-weight: 500; font-size: 0.875rem;">Dashboard</a>
                <a href="{{ route('posts.create') }}" class="btn btn-primary" style="justify-content: center; margin-top: 0.5rem; display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white; box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);">
                    <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 1rem; height: 1rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Write
                </a>
                <button onclick="toggleTheme()" class="theme-toggle" style="margin-top: 0.5rem;">
                    <span id="theme-icon">🌙</span>
                </button>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary" style="justify-content: center; margin-top: 0.5rem; display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white; box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);">Join</a>
                <a href="{{ route('login') }}" class="btn btn-outline" style="justify-content: center; margin-top: 0.5rem; display: inline-flex; align-items: center; gap: 0.375rem; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: all 0.3s ease; border: 1px solid var(--gray-300); background: transparent; color: var(--gray-600);">Login</a>
                <button onclick="toggleTheme()" class="theme-toggle" style="margin-top: 0.5rem;">
                    <span id="theme-icon">🌙</span>
                </button>
            @endauth
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="main-content">
    <div class="settings-container">
        <div class="settings-header">
            <h1 class="settings-title">Profile Settings</h1>
            <p class="settings-subtitle">Update your name and email address</p>
        </div>

        <?php
        use App\Models\User;
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Session;
        use Illuminate\Validation\Rule;
        use Livewire\Volt\Component;

        new class extends Component {
            public string $name = '';
            public string $email = '';

            /**
             * Mount the component.
             */
            public function mount(): void
            {
                $this->name = Auth::user()->name;
                $this->email = Auth::user()->email;
            }

            /**
             * Update the profile information for the currently authenticated user.
             */
            public function updateProfileInformation(): void
            {
                $user = Auth::user();

                $validated = $this->validate([
                    'name' => ['required', 'string', 'max:255'],

                    'email' => [
                        'required',
                        'string',
                        'lowercase',
                        'email',
                        'max:255',
                        Rule::unique(User::class)->ignore($user->id)
                    ],
                ]);

                $user->fill($validated);

                if ($user->isDirty('email')) {
                    $user->email_verified_at = null;
                }

                $user->save();

                $this->dispatch('profile-updated', name: $user->name);
            }

            /**
             * Send an email verification notification to the current user.
             */
            public function resendVerificationNotification(): void
            {
                $user = Auth::user();

                if ($user->hasVerifiedEmail()) {
                    $this->redirectIntended(default: route('dashboard', absolute: false));

                    return;
                }

                $user->sendEmailVerificationNotification();

                Session::flash('status', 'verification-link-sent');
            }
        }; ?>

        <form wire:submit="updateProfileInformation" class="settings-form">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input wire:model="name" id="name" type="text" class="form-input" required autofocus autocomplete="name">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input wire:model="email" id="email" type="email" class="form-input" required autocomplete="email">

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div style="margin-top: 0.75rem; font-size: 0.875rem; color: var(--gray-600);">
                        {{ __('Your email address is unverified.') }}

                        <button type="button" wire:click.prevent="resendVerificationNotification" 
                               style="background: none; border: none; padding: 0; color: var(--primary); cursor: pointer; text-decoration: underline; font-size: 0.875rem;">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p style="margin-top: 0.75rem; color: var(--success); font-weight: 500;">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save Changes') }}
                </button>

                <div class="success-message" wire:loading.remove wire:target="updateProfileInformation">
                    <span x-data x-show="$wire.saved" x-init="setTimeout(() => $wire.saved = false, 2000)">
                        {{ __('Saved.') }}
                    </span>
                </div>
            </div>
        </form>

        <hr style="margin: 2.5rem 0; border: none; height: 1px; background: var(--gray-200);">

        <livewire:settings.delete-user-form />
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


