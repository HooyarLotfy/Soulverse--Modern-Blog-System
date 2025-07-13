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
            grid-template-columns: 1fr;
            gap: 2rem;
            margin-top: 4rem;
        }

        @media (min-width: 1024px) {
            .content-grid {
                grid-template-columns: 2fr 1fr;
                gap: 3rem;
            }
        }

        /* Posts Grid */
        .posts-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: var(--section-padding) var(--container-padding);
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
            align-items: start;
        }

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.25rem;
            }
        }

        @media (max-width: 640px) {
            .posts-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .posts-container {
                padding: 1rem;
            }
        }

        .post-card {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--gray-200);
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .dark .post-card {
            background: var(--gray-800);
            border: 1px solid var(--gray-700);
        }

        .post-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        /* Desktop-only improvements for post cards */
        @media (min-width: 1024px) {
            .post-card {
                box-shadow: 0 8px 25px -5px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
                border-radius: 1.25rem;
                background: linear-gradient(145deg, rgba(255, 255, 255, 0.98), rgba(255, 255, 255, 1));
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.8);
            }
            
            .dark .post-card {
                background: linear-gradient(145deg, rgba(30, 41, 59, 0.95), rgba(30, 41, 59, 1));
                box-shadow: 0 8px 25px -5px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.15);
                border: 1px solid rgba(71, 85, 105, 0.6);
            }

            .post-card:hover {
                transform: translateY(-8px) scale(1.015);
                box-shadow: 0 32px 64px -12px rgba(139, 92, 246, 0.2), 0 20px 40px -8px rgba(0, 0, 0, 0.12);
                border-color: rgba(139, 92, 246, 0.4);
            }
            
            .dark .post-card:hover {
                box-shadow: 0 32px 64px -12px rgba(139, 92, 246, 0.35), 0 20px 40px -8px rgba(0, 0, 0, 0.5);
                border-color: rgba(139, 92, 246, 0.5);
            }
        }

        .post-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: var(--gray-200);
            transition: transform 0.3s ease;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .post-card:hover .post-image {
            transform: scale(1.05);
        }

        /* Desktop-only image improvements */
        @media (min-width: 1024px) {
            .post-image {
                height: 240px;
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .post-card:hover .post-image {
                transform: scale(1.08);
            }
        }

        .post-content {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        @media (max-width: 640px) {
            .post-image {
                height: 180px;
            }
            
            .post-content {
                padding: 1rem;
            }
        }

        /* Desktop-only content improvements */
        @media (min-width: 1024px) {
            .post-content {
                padding: 2rem;
            }
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
            flex-wrap: wrap;
        }

        .post-category {
            background: rgba(139, 92, 246, 0.1);
            color: var(--primary);
            padding: 0.125rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .post-date {
            color: var(--gray-500);
            font-size: 0.75rem;
            white-space: nowrap;
        }

        @media (max-width: 480px) {
            .post-meta {
                gap: 0.375rem;
            }
            
            .post-category {
                font-size: 0.7rem;
                padding: 0.1rem 0.375rem;
            }
            
            .post-date {
                font-size: 0.7rem;
            }
        }

        .post-title {
            font-family: var(--font-serif);
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .dark .post-title {
            color: var(--gray-100);
        }

        .post-title a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
        }

        .post-title a:hover {
            color: var(--primary);
        }

        .post-excerpt {
            color: var(--gray-600);
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
            word-wrap: break-word;
            hyphens: auto;
        }

        .dark .post-excerpt {
            color: var(--gray-300);
        }

        .post-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-top: auto;
            flex-wrap: wrap;
        }

        @media (max-width: 480px) {
            .post-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
        }

        .post-author {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 0;
            flex-shrink: 1;
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
            flex-shrink: 0;
            overflow: hidden;
            position: relative;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .author-name {
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--gray-700);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            min-width: 0;
        }

        .dark .author-name {
            color: var(--gray-300);
        }

        .post-stats {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.75rem;
            color: var(--gray-500);
            flex-shrink: 0;
        }

        .post-stats span {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            white-space: nowrap;
        }

        @media (max-width: 480px) {
            .post-author {
                flex: 1;
                min-width: 0;
            }
            
            .post-stats {
                gap: 0.5rem;
            }
            
            .post-stats span {
                font-size: 0.7rem;
            }
        }

        /* Comments Section */
        .comments-section .comments-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .comments-section .comments-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media (min-width: 1024px) {
            .comments-section .comments-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .comment-card {
            break-inside: avoid;
        }

        .comment-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
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
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .dark .comment-text {
            color: var(--gray-300);
        }

        /* Latest Comments Section Styles */
        .latest-comments-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .latest-comments-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .latest-comments-grid {
            display: grid;
            grid-template-columns: 2fr;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .latest-comments-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
                justify-items: stretch;
            }
        }

        @media (min-width: 1024px) {
            .latest-comments-section {
                padding: 0 2rem;
            }
            
            .latest-comments-grid {
                max-width: 100%;
                margin: 0 auto;
            }
        }

        .latest-comments-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .latest-comments-grid {
            gap: 2rem;
            }
        }

        .latest-comment-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 1rem;
            padding: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            max-width: 420px;
            width: 100%;
            margin: 0.5rem;
        }

        .dark .latest-comment-card {
            background: rgba(30, 41, 59, 0.9);
            border: 1px solid rgba(71, 85, 105, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .latest-comment-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .dark .latest-comment-card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .latest-comment-author-section {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .latest-comment-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
        }

        .latest-comment-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .latest-comment-avatar-fallback {
            position: absolute;
            top: 0;
            left: 0;
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: none;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .latest-comment-avatar-gradient {
            width: 2.5rem;
            height: 2.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .latest-comment-user-info {
            flex: 1;
            min-width: 0;
        }

        .latest-comment-name {
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
            word-break: break-word;
        }

        .dark .latest-comment-name {
            color: var(--gray-100);
        }

        .latest-comment-time {
            font-size: 0.75rem;
            color: var(--gray-500);
        }

        .dark .latest-comment-time {
            color: var(--gray-400);
        }

        .latest-comment-body {
            color: var(--gray-700);
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            word-break: break-word;
        }

        .dark .latest-comment-body {
            color: var(--gray-300);
        }

        .latest-comment-post-info {
            font-size: 0.75rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .dark .latest-comment-post-info {
            color: var(--gray-400);
        }

        .latest-comment-post-title {
            font-weight: 500;
            color: var(--primary);
            word-break: break-word;
        }

        .dark .latest-comment-post-title {
            color: var(--primary);
        }

        /* Empty state for comments */
        .latest-comments-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem;
        }

        .latest-comments-empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .latest-comments-empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .dark .latest-comments-empty-title {
            color: var(--gray-100);
        }

        .latest-comments-empty-text {
            color: var(--gray-600);
            margin-bottom: 2rem;
        }

        .dark .latest-comments-empty-text {
            color: var(--gray-400);
        }
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

<body>
    @include('layouts.navigation')
    
</nav>
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
</script>

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
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary">Join the Community</a>
                @endauth
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Explore Posts</a>
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
                                    @if($post->user->avatar)
                                        <div class="author-avatar">
                                            <img src="{{ asset('storage/'.$post->user->avatar) . '?v=' . $post->user->updated_at->timestamp }}" 
                                                 alt="{{ $post->user->name }}"
                                                 class="w-full h-full object-cover rounded-full"
                                                 data-avatar-user="{{ $post->user->id }}"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            <div class="avatar-fallback w-full h-full rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-sm" 
                                                 style="display: none;"
                                                 data-avatar-user="{{ $post->user->id }}">
                                                {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="author-avatar" data-avatar-user="{{ $post->user->id }}">
                                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                        </div>
                                    @endif
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
        <section class="latest-comments-section">
            <div class="latest-comments-header">
                <h2 class="section-title">💬 Latest Comments</h2>
                <p class="section-subtitle">Join the ongoing conversations and see what the community is discussing</p>
            </div>
            
            <div class="latest-comments-grid">
                @forelse($comments as $comment)
                    <div class="latest-comment-card" onclick="window.location.href='{{ route('posts.show', $comment->post) }}'">
                        <div class="latest-comment-author-section">
                            @if($comment->user->avatar)
                                <div class="latest-comment-avatar">
                                    <img src="{{ asset('storage/'.$comment->user->avatar) . '?v=' . $comment->user->updated_at->timestamp }}" 
                                         alt="{{ $comment->user->name }}"
                                         data-avatar-user="{{ $comment->user->id }}"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="latest-comment-avatar-fallback"
                                         data-avatar-user="{{ $comment->user->id }}">
                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                    </div>
                                </div>
                            @else
                                <div class="latest-comment-avatar-gradient"
                                     data-avatar-user="{{ $comment->user->id }}">
                                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="latest-comment-user-info">
                                <div class="latest-comment-name">{{ $comment->user->name }}</div>
                                <div class="latest-comment-time">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        
                        <p class="latest-comment-body">
                            {{ Str::limit($comment->body, 120) }}
                        </p>
                        
                        <div class="latest-comment-post-info">
                            <span>💬 on</span>
                            <span class="latest-comment-post-title">{{ Str::limit($comment->post->title, 50) }}</span>
                        </div>
                    </div>
                @empty
                    <div class="latest-comments-empty">
                        <div class="latest-comments-empty-icon">💭</div>
                        <h4 class="latest-comments-empty-title">No comments yet</h4>
                        <p class="latest-comments-empty-text">Be the first to join the conversation!</p>
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
    
    <!-- Avatar Refresh Script -->
    <script src="{{ asset('js/avatar-refresh.js') }}"></script>
</body>
</html>
</html>


