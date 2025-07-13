<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Join SoulVerse - Where Stories Come Alive</title>
    
    <!-- SEO Meta -->
    <meta name="description" content="Join SoulVerse, a modern blogging platform where writers share their stories, insights, and creativity. Sign up to start your writing journey.">
    <meta name="keywords" content="sign up, register, blog, stories, writing, creative writing, community, social media">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Join SoulVerse - Where Stories Come Alive">
    <meta property="og:description" content="Create your account on SoulVerse and start your writing journey">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/register') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🧿</text></svg>">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

</head>
<body>
@include('layouts.navigation')

    <!-- Main Content -->
    <main>
        <div class="auth-container">
            <div class="auth-card">
                <div class="auth-header">
                    <h1 class="auth-title">Begin your evolution</h1>
                    <p class="auth-subtitle">Create your account and start documenting your journey</p>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name" class="form-label">Full Name</label>
                        <input id="name" 
                               name="name" 
                               type="text" 
                               autocomplete="name" 
                               required
                               value="{{ old('name') }}"
                               class="form-input"
                               placeholder="Enter your full name">
                        @error('name')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" 
                               name="email" 
                               type="email" 
                               autocomplete="email" 
                               required
                               value="{{ old('email') }}"
                               class="form-input"
                               placeholder="Enter your email">
                        @error('email')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" 
                               name="password" 
                               type="password" 
                               autocomplete="new-password" 
                               required
                               class="form-input"
                               placeholder="Create a strong password">
                        @error('password')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" 
                               name="password_confirmation" 
                               type="password" 
                               autocomplete="new-password" 
                               required
                               class="form-input"
                               placeholder="Confirm your password">
                        @error('password_confirmation')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Create Account
                    </button>

                    <!-- Login Link -->
                    <div class="auth-footer">
                        Already have an account?
                        <a href="{{ route('login') }}" class="auth-link">
                            Sign in here
                        </a>
                    </div>
                </form>
            </div>
        </div>
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
            initTheme();
        });
    </script>
</body>
</html>


