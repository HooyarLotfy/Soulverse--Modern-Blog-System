<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title>All Posts | <?php echo e(config('app.name', 'SoulVerse')); ?></title>
    
    <!-- SEO Meta -->
    <meta name="description" content="Explore a curated collection of thoughts, experiences, and creative expressions from our community of writers.">
    <meta name="keywords" content="blog, stories, writing, creative writing, community">
    <meta name="author" content="SoulVerse">
    
    <!-- Open Graph -->
    <meta property="og:title" content="All Posts | SoulVerse">
    <meta property="og:description" content="Explore a curated collection of thoughts, experiences, and creative expressions">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🧿</text></svg>">
    
    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>    
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
        }        /* Hero Section */
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
        }      /* Mobile Menu */
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
            padding: 1rem 1.5rem;
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

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
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

        .hero-description,
        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .dark .hero-description,
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

        /* Filters Section */
        .filters-section {
            background: white;
            border-bottom: 1px solid var(--gray-200);
            padding: 1rem 0;
            top: 4rem;
            z-index: 100;
        }

        .dark .filters-section {
            background: var(--gray-800);
            border-bottom: 1px solid var(--gray-700);
        }

        .filters-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 var(--container-padding);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.375rem 0.75rem;
            border: 1px solid var(--gray-300);
            background: white;
            color: var(--gray-600);
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .dark .filter-btn {
            background: var(--gray-700);
            border-color: var(--gray-600);
            color: var(--gray-300);
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .search-box {
            flex: 1;
            max-width: 300px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border: 1px solid var(--gray-300);
            border-radius: 9999px;
            background: white;
            color: var(--gray-800);
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .dark .search-input {
            background: var(--gray-700);
            border-color: var(--gray-600);
            color: var(--gray-100);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            color: var(--gray-400);
        }

        @media (max-width: 768px) {
            .filters-content {
                flex-direction: column;
                align-items: stretch;
                gap: 0.75rem;
            }

            .filter-group {
                justify-content: center;
            }

            .search-box {
                max-width: none;
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

        .admin-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.75rem;
            padding-top: 0.75rem;
            border-top: 1px solid var(--gray-200);
            flex-wrap: wrap;
        }

        .dark .admin-actions {
            border-top: 1px solid var(--gray-700);
        }

        .admin-btn {
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            border: none;
            cursor: pointer;
            white-space: nowrap;
            flex-shrink: 0;
        }

        @media (max-width: 480px) {
            .admin-actions {
                gap: 0.375rem;
            }
            
            .admin-btn {
                padding: 0.375rem 0.75rem;
                font-size: 0.7rem;
                flex: 1;
                justify-content: center;
                min-width: 0;
            }
        }

        .admin-btn-edit {
            background: rgba(139, 92, 246, 0.1);
            color: var(--primary);
        }

        .admin-btn-edit:hover {
            background: var(--primary);
            color: white;
        }

        .admin-btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: var(--error);
        }

        .admin-btn-delete:hover {
            background: var(--error);
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 1rem;
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .dark .empty-title {
            color: var(--gray-200);
        }

        .empty-description {
            color: var(--gray-600);
            margin-bottom: 2rem;
        }

        .dark .empty-description {
            color: var(--gray-400);
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
            padding: 0 var(--container-padding);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 640px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        .footer-section h3 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .footer-section p,
        .footer-section a {
            color: var(--gray-300);
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.875rem;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section li {
            margin-bottom: 0.5rem;
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-700);
            padding-top: 1rem;
            text-align: center;
            color: var(--gray-400);
            font-size: 0.875rem;
        }

        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 2rem;
            grid-column: 1 / -1;
        }

        .loading.active {
            display: block;
        }

        .spinner {
            width: 2rem;
            height: 2rem;
            border: 2px solid var(--gray-300);
            border-top: 2px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Utility Classes */
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

        /* Icon Sizes - Fixed */
        .icon-sm {
            width: 1rem;
            height: 1rem;
        }

        .icon-md {
            width: 1.25rem;
            height: 1.25rem;        }

        .icon-lg {
            width: 1.5rem;
            height: 1.5rem;
        }    </style>
</head>

<body>
<!-- Navigation -->
<?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script>
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

    // Toggle mobile menu
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        if (menu.classList.contains('active')) {
            menu.classList.remove('active');
            menu.style.display = 'none';
        } else {
            menu.classList.add('active');
            menu.style.display = 'block';
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

    window.addEventListener('resize', handleNavbarResponsive);
    document.addEventListener('DOMContentLoaded', handleNavbarResponsive);

    // Theme Toggle
    function toggleTheme() {
        const html = document.documentElement;
        const themeIconDesktop = document.getElementById('theme-icon-desktop');
        const themeIconMobile = document.getElementById('theme-icon-mobile');
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            if (themeIconDesktop) themeIconDesktop.textContent = '🌙';
            if (themeIconMobile) themeIconMobile.textContent = '🌙';
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            if (themeIconDesktop) themeIconDesktop.textContent = '☀️';
            if (themeIconMobile) themeIconMobile.textContent = '☀️';
            localStorage.setItem('theme', 'dark');
        }
    }

    // Initialize theme
    function initTheme() {
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const html = document.documentElement;
        const themeIconDesktop = document.getElementById('theme-icon-desktop');
        const themeIconMobile = document.getElementById('theme-icon-mobile');
        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            html.classList.add('dark');
            if (themeIconDesktop) themeIconDesktop.textContent = '☀️';
            if (themeIconMobile) themeIconMobile.textContent = '☀️';
        } else {
            html.classList.remove('dark');
            if (themeIconDesktop) themeIconDesktop.textContent = '🌙';
            if (themeIconMobile) themeIconMobile.textContent = '🌙';
        }
    }
    document.addEventListener('DOMContentLoaded', initTheme);
</script>

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
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Discover Amazing Stories</h1>
            <p class="hero-description">
                Explore a curated collection of thoughts, experiences, and creative expressions from our community of talented writers.
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="filters-section">
        <div class="filters-content">
            <div class="filter-group">
                <a href="<?php echo e(route('posts.index')); ?>" class="filter-btn <?php echo e(!request('category') && !request('arc') ? 'active' : ''); ?>">
                    All Posts
                </a>
                <?php if(isset($categories) && $categories->count() > 0): ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('posts.index', ['category' => $category])); ?>" 
                           class="filter-btn <?php echo e(request('category') === $category ? 'active' : ''); ?>">
                            <?php echo e($category); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(isset($arcs) && $arcs->count() > 0): ?>
                    <?php $__currentLoopData = $arcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('posts.index', ['arc' => $arc->slug ?? $arc->id])); ?>" 
                           class="filter-btn <?php echo e(request('arc') === ($arc->slug ?? $arc->id) ? 'active' : ''); ?>">
                            <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <?php echo e($arc->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            
            <div class="search-box">
                <svg class="search-icon icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" 
                       class="search-input" 
                       placeholder="Search posts..." 
                       id="searchInput"
                       value="<?php echo e(request('search')); ?>">
            </div>
        </div>    </section>

    <!-- Main Content -->
    <main style="margin-top: 2rem;">
        <div class="posts-container">
            <div class="posts-grid" id="postsGrid">
                <!-- Loading State -->
                <div class="loading" id="loading">
                    <div class="spinner"></div>
                    <p>Loading posts...</p>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="post-card" data-category="<?php echo e($post->category ?? 'uncategorized'); ?>" data-title="<?php echo e(strtolower($post->title)); ?>">
                        <?php if($post->cover_image): ?>
                            <img src="<?php echo e(asset('storage/' . $post->cover_image)); ?>" alt="<?php echo e($post->title); ?>" class="post-image">
                        <?php else: ?>
                            <div class="post-image" style="background: linear-gradient(135deg, 
                                <?php echo e(['#8b5cf6', '#06b6d4', '#f59e0b', '#10b981', '#ef4444'][array_rand(['#8b5cf6', '#06b6d4', '#f59e0b', '#10b981', '#ef4444'])]); ?> 0%, 
                                <?php echo e(['#7c3aed', '#0891b2', '#d97706', '#059669', '#dc2626'][array_rand(['#7c3aed', '#0891b2', '#d97706', '#059669', '#dc2626'])]); ?> 100%); 
                                display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
                                📖
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <div class="post-meta">
                                <?php if($post->arc): ?>
                                    <span class="post-category" style="background: rgba(6, 182, 212, 0.1); color: var(--secondary);">
                                        <?php echo e($post->arc->title); ?>

                                    </span>
                                <?php endif; ?>
                                <?php if($post->category): ?>
                                    <span class="post-category">
                                        <?php echo e($post->category); ?>

                                    </span>
                                <?php endif; ?>
                                <span class="post-date"><?php echo e($post->created_at->format('M j, Y')); ?></span>
                            </div>
                            
                            <h2 class="post-title">
                                <a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e($post->title); ?></a>
                            </h2>
                            
                            <p class="post-excerpt">
                                <?php echo e(Str::limit(strip_tags($post->body), 120)); ?>

                            </p>
                            
                            <div class="post-footer">
                                <div class="post-author">
                                    <?php if($post->user->avatar): ?>
                                        <div class="author-avatar">
                                            <img src="<?php echo e(asset('storage/'.$post->user->avatar) . '?v=' . $post->user->updated_at->timestamp); ?>" 
                                                 alt="<?php echo e($post->user->name); ?>"
                                                 onerror="this.style.display='none'; this.parentElement.style.background='linear-gradient(135deg, var(--primary), var(--secondary))'; this.parentElement.innerHTML='<?php echo e(strtoupper(substr($post->user->name ?? 'A', 0, 1))); ?>';">
                                        </div>
                                    <?php else: ?>
                                        <div class="author-avatar">
                                            <?php echo e(strtoupper(substr($post->user->name ?? 'A', 0, 1))); ?>

                                        </div>
                                    <?php endif; ?>
                                    <span class="author-name"><?php echo e($post->user->name ?? 'Anonymous'); ?></span>
                                </div>
                                
                                <div class="post-stats">
                                    <span>
                                        <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                        <?php echo e($post->comments->count()); ?>

                                    </span>
                                    <span>
                                        <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <?php echo e($post->reactions->count()); ?>

                                    </span>
                                </div>
                            </div>

                            <?php if(Auth::user() && Auth::user()->is_admin): ?>
                                <div class="admin-actions">
                                    <a href="<?php echo e(route('posts.edit', $post)); ?>" class="admin-btn admin-btn-edit">
                                        <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('posts.destroy', $post)); ?>" 
                                          onsubmit="return confirm('Are you sure you want to delete this post?')" 
                                          style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="admin-btn admin-btn-delete">
                                            <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-state">
                        <div class="empty-icon">📝</div>
                        <h3 class="empty-title">No posts found</h3>
                        <p class="empty-description">
                            <?php if(request('search') || request('category') || request('arc')): ?>
                                Try adjusting your filters or search terms.
                            <?php else: ?>
                                Be the first to share your story!
                            <?php endif; ?>
                        </p>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">
                                <svg class="icon-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Create Post
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Join to Write</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if($posts->hasPages()): ?>
                <div style="display: flex; justify-content: center; margin-top: 3rem;">
                    <?php echo e($posts->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </main>    <!-- Footer -->
    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script>
      

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        let searchTimeout;

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                const searchTerm = this.value.toLowerCase();
                filterPosts(searchTerm);
            }, 300);
        });

        function filterPosts(searchTerm) {
            const posts = document.querySelectorAll('.post-card');
            const loading = document.getElementById('loading');
            
            // Show loading
            loading.classList.add('active');
            
            setTimeout(() => {
                posts.forEach(post => {
                    const title = post.dataset.title;
                    const content = post.textContent.toLowerCase();
                    
                    if (title.includes(searchTerm) || content.includes(searchTerm)) {
                        post.style.display = 'block';
                        post.style.animation = 'fadeInUp 0.6s ease';
                    } else {
                        post.style.display = 'none';
                    }
                });
                
                // Hide loading
                loading.classList.remove('active');
                
                // Check if no results
                const visiblePosts = document.querySelectorAll('.post-card[style*="display: block"], .post-card:not([style*="display: none"])');
                const emptyState = document.querySelector('.empty-state');
                
                if (visiblePosts.length === 0 && searchTerm) {
                    if (!emptyState) {
                        const newEmptyState = document.createElement('div');
                        newEmptyState.className = 'empty-state';
                        newEmptyState.innerHTML = `
                            <div class="empty-icon">🔍</div>
                            <h3 class="empty-title">No posts found</h3>
                            <p class="empty-description">Try adjusting your search terms.</p>
                        `;
                        document.getElementById('postsGrid').appendChild(newEmptyState);
                    }
                } else if (emptyState && !emptyState.classList.contains('original-empty')) {
                    emptyState.remove();
                }
            }, 300);
        }

        // Smooth scroll for navbar on mobile
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            const isDarkMode = document.documentElement.classList.contains('dark');
            
            if (window.scrollY > 100) {
                navbar.style.background = isDarkMode ? 'rgba(15, 23, 42, 0.98)' : 'rgba(255, 255, 255, 0.98)';
            } else {
                navbar.style.background = isDarkMode ? 'rgba(15, 23, 42, 0.95)' : 'rgba(255, 255, 255, 0.95)';
            }
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

        // Initialize animations on load
        document.addEventListener('DOMContentLoaded', function() {
            const postCards = document.querySelectorAll('.post-card');
            postCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
        });

        // Handle filter clicks with URL updates
        document.querySelectorAll('.filter-btn').forEach(btn => {            btn.addEventListener('click', function(e) {
                // Don't prevent default for actual navigation
                // Just add visual feedback
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });        });
    </script>
    

</body>
</html>


<?php /**PATH E:\Vs Code Projects\Laravel Projects\SoulVerse Web App\soulverse\resources\views/posts/index.blade.php ENDPATH**/ ?>