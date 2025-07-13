<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo e($post->title); ?> | <?php echo e(config('app.name', 'SoulVerse')); ?></title>
    
    <!-- SEO Meta -->
    <meta name="description" content="<?php echo e(Str::limit(strip_tags($post->body), 150)); ?>">
    <meta name="keywords" content="blog post, <?php echo e($post->title); ?>, creative writing">
    <meta name="author" content="<?php echo e($post->user->name ?? 'SoulVerse'); ?>">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo e($post->title); ?>">
    <meta property="og:description" content="<?php echo e(Str::limit(strip_tags($post->body), 150)); ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <?php if($post->cover_image): ?>
        <meta property="og:image" content="<?php echo e(asset('storage/' . $post->cover_image)); ?>">
    <?php endif; ?>
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($post->title); ?>">
    <meta name="twitter:description" content="<?php echo e(Str::limit(strip_tags($post->body), 150)); ?>">
    <?php if($post->cover_image): ?>
        <meta name="twitter:image" content="<?php echo e(asset('storage/' . $post->cover_image)); ?>">
    <?php endif; ?>
    
  
 
    
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
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 5.5rem;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.5rem;
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
            gap: 2rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
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
            bottom: -0.5rem;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--gray-600);
            border: 2px solid var(--gray-300);
        }

        .dark .btn-outline {
            color: var(--gray-300);
            border-color: var(--gray-600);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: var(--gray-600);
            cursor: pointer;
            padding: 0.5rem;
        }

        .dark .mobile-menu-btn {
            color: var(--gray-300);
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
            padding: 1rem;
        }

        .dark .mobile-menu {
            background: rgba(15, 23, 42, 0.98);
            border-top: 1px solid rgba(71, 85, 105, 0.2);
        }

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .mobile-menu.active {
                display: block;
            }
            
            .mobile-nav {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .dark .card {
            background: var(--gray-800);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        /* Post Content Styles */
        .prose {
            font-family: var(--font-serif);
            color: var(--gray-700);
            max-width: none;
        }

        .dark .prose {
            color: var(--gray-300);
        }

        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            font-family: var(--font-serif);
            font-weight: 700;
            color: var(--gray-900);
            margin-top: 2em;
            margin-bottom: 1em;
        }

        .dark .prose h1, .dark .prose h2, .dark .prose h3, .dark .prose h4, .dark .prose h5, .dark .prose h6 {
            color: var(--gray-100);
        }

        .prose p {
            margin-bottom: 1.5em;
            font-size: 1.125rem;
            line-height: 1.8;
        }

        .prose blockquote {
            border-left: 4px solid var(--primary);
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            background: var(--gray-50);
            padding: 1.5rem;
            border-radius: 0.5rem;
        }

        .dark .prose blockquote {
            background: var(--gray-800);
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
            padding: 0 1rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .footer-section p,
        .footer-section a {
            color: var(--gray-300);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary);
        }        .footer-bottom {
            border-top: 1px solid var(--gray-700);
            padding-top: 1rem;
            text-align: center;
            color: var(--gray-400);
        }

        /* Reading Progress Bar */
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            z-index: 1000;
            transition: width 0.3s ease;
        }

        /* Enhanced Card Animations */
        .card {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating Action Buttons */
        .floating-actions {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 100;
        }

        .floating-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(139, 92, 246, 0.4);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .floating-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(139, 92, 246, 0.6);
        }

        @media (max-width: 768px) {
            .floating-actions {
                bottom: 1rem;
                right: 1rem;
            }
            
            .floating-btn {
                width: 48px;
                height: 48px;
            }
        }
    </style>
</head>

<body>
       <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Reading Progress Bar -->
    <div class="reading-progress" id="readingProgress"></div>
    
 


    <!-- Main Content -->
    <main>
        <!-- Post Header -->
        <article>
            <!-- Cover Image Section -->
            <?php if($post->cover_image): ?>
                <div class="relative w-full h-48 sm:h-64 md:h-80 lg:h-[28rem] overflow-hidden rounded-none sm:rounded-xl shadow-none sm:shadow mb-4 sm:mb-8 flex items-end">
                    <img src="<?php echo e(asset('storage/' . $post->cover_image)); ?>" 
                         alt="<?php echo e($post->title); ?>"
                         class="w-full h-full object-cover object-center" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    <!-- Title Overlay on Image -->
                    <div class="absolute bottom-2 sm:bottom-4 left-0 right-0">
                        <div class="max-w-5xl mx-auto px-3 sm:px-4 lg:px-8">
                            <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-1 sm:mb-2 leading-tight font-serif break-words">
                                <?php echo e($post->title); ?>

                            </h1>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Post Content -->
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
                <?php if(!$post->cover_image): ?>
                    <!-- Title for posts without cover image -->
                    <header class="mb-8 sm:mb-12 text-center">
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-white mb-6 leading-tight font-serif break-words">
                            <?php echo e($post->title); ?>

                        </h1>
                    </header>
                <?php endif; ?>

                <!-- Post Meta -->
                <div class="flex flex-wrap items-center gap-4 mb-6 sm:mb-8 text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex items-center gap-3 min-w-0">
                        <?php if($post->user->avatar): ?>
                            <div class="w-10 h-10 rounded-full overflow-hidden flex-shrink-0">
                                <img src="<?php echo e(asset('storage/'.$post->user->avatar) . '?v=' . $post->user->updated_at->timestamp); ?>" 
                                     alt="<?php echo e($post->user->name); ?>"
                                     class="w-full h-full object-cover"
                                     data-avatar-user="<?php echo e($post->user->id); ?>"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm" 
                                     style="display: none;"
                                     data-avatar-user="<?php echo e($post->user->id); ?>">
                                    <?php echo e(strtoupper(substr($post->user->name ?? 'A', 0, 1))); ?>

                                </div>
                            </div>
                        <?php else: ?>
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0"
                                 data-avatar-user="<?php echo e($post->user->id); ?>">
                                <?php echo e(strtoupper(substr($post->user->name ?? 'A', 0, 1))); ?>

                            </div>
                        <?php endif; ?>
                        <div class="min-w-0">
                            <div class="font-semibold text-gray-900 dark:text-white truncate"><?php echo e($post->user->name ?? 'Anonymous'); ?></div>
                            <time datetime="<?php echo e($post->created_at->toISOString()); ?>" class="text-xs text-gray-500">
                                <?php echo e($post->created_at->format('F j, Y')); ?>

                            </time>
                        </div>
                    </div>
                    <?php if($post->arc): ?>
                        <span class="hidden sm:inline text-gray-400">•</span>
                        <a href="<?php echo e(route('arcs.show', $post->arc)); ?>" 
                           class="inline-flex items-center px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full hover:bg-indigo-200 dark:hover:bg-indigo-800 transition-colors whitespace-nowrap">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <?php echo e($post->arc->title); ?>

                        </a>
                    <?php endif; ?>
                    <?php if($post->privacy === 'private'): ?>
                        <span class="hidden sm:inline text-gray-400">•</span>
                        <span class="inline-flex items-center px-3 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full whitespace-nowrap">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Private
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Post Content -->
                <div class="prose prose-lg dark:prose-invert max-w-none mb-8 sm:mb-12 break-words">
                    <?php echo $post->body; ?>

                </div>

                <!-- Post Actions -->
                <div class="flex flex-wrap items-center gap-4 mb-8 pb-8 border-b border-gray-200 dark:border-gray-700">
                    <!-- Reactions -->
                    <form method="POST" action="<?php echo e(route('reactions.store')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="like">
                        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                        <button type="submit" 
                                class="inline-flex items-center gap-2 px-4 py-2 sm:px-6 sm:py-3 bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            <?php echo e($post->reactions->count()); ?>

                        </button>
                    </form>
                    <!-- Comments Count -->
                    <div class="inline-flex items-center gap-2 px-4 py-2 sm:px-6 sm:py-3 bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <?php echo e($post->comments->count()); ?> <?php echo e(Str::plural('comment', $post->comments->count())); ?>

                    </div>
                    <!-- Views -->
                    <div class="inline-flex items-center gap-2 px-4 py-2 sm:px-6 sm:py-3 bg-gray-50 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <?php echo e($post->views ?? 0); ?> <?php echo e(Str::plural('view', $post->views ?? 0)); ?>

                    </div>
                </div>

                <!-- Admin Actions -->
                <?php if(Auth::user() && Auth::user()->is_admin): ?>
                    <div class="flex flex-wrap gap-3 mb-8">
                        <a href="<?php echo e(route('posts.edit', $post)); ?>" 
                           class="btn btn-primary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Post
                        </a>
                        <form method="POST" action="<?php echo e(route('posts.destroy', $post)); ?>" 
                              onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" 
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Post
                            </button>
                        </form>
                    </div>
                <?php endif; ?>

                <!-- Navigation -->
                <div class="mb-12">
                    <a href="<?php echo e(route('posts.index')); ?>" 
                       class="inline-flex items-center gap-2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to All Posts
                    </a>
                </div>
            </div>
        </article>

        <!-- Comments Section -->
        <section class="py-8 sm:py-12">
            <div class="max-w-5xl mx-auto px-2 sm:px-4 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 sm:mb-8">
                    Comments (<?php echo e($post->comments->count()); ?>)
                </h2>
                <!-- Comment Form -->
                <?php if(auth()->guard()->check()): ?>
                    <form method="POST" action="<?php echo e(route('comments.store', $post)); ?>" class="mb-8 sm:mb-12">
                        <?php echo csrf_field(); ?>
                        <div class="card p-4 sm:p-6">
                            <label for="comment-body" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                                Share your thoughts
                            </label>
                            <textarea name="body" 
                                      id="comment-body"
                                      rows="4" 
                                      class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2 sm:px-4 sm:py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors" 
                                      placeholder="Write a thoughtful comment..."></textarea>
                            <div class="mt-3 sm:mt-4 flex justify-end">
                                <button type="submit" class="btn btn-primary">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    Post Comment
                                </button>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <div class="card p-4 sm:p-6 mb-8 sm:mb-12 text-center">
                        <p class="text-gray-600 dark:text-gray-400 mb-3 sm:mb-4">Please log in to join the conversation</p>
                        <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">
                                Sign In
                            </a>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-outline">
                                Sign Up
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Comments List -->
                <?php if($post->comments->count() > 0): ?>
                    <div class="space-y-4 sm:space-y-6">
                        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card p-4 sm:p-6">
                                <div class="flex flex-col sm:flex-row items-start gap-3 sm:gap-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                                        <?php echo e(strtoupper(substr($comment->user->name ?? 'A', 0, 1))); ?>

                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-2 mb-1 sm:mb-2">
                                            <span class="font-semibold text-gray-900 dark:text-white truncate">
                                                <?php echo e($comment->user->name ?? 'Anonymous'); ?>

                                            </span>
                                            <span class="hidden sm:inline text-gray-400">•</span>
                                            <time class="text-sm text-gray-500 dark:text-gray-400" 
                                                  datetime="<?php echo e($comment->created_at->toISOString()); ?>">
                                                <?php echo e($comment->created_at->diffForHumans()); ?>

                                            </time>
                                        </div>
                                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed break-words">
                                            <?php echo e($comment->body); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-8 sm:py-12">
                        <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto text-gray-400 dark:text-gray-600 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1 sm:mb-2">No comments yet</h3>
                        <p class="text-gray-500 dark:text-gray-400">Be the first to share your thoughts!</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- Floating Actions -->
    <div class="floating-actions">
        <button class="floating-btn" onclick="scrollToTop()" title="Back to top">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
            </svg>
        </button>
        <button class="floating-btn" onclick="sharePost()" title="Share post">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
            </svg>
        </button>
    </div>

    <!-- Footer -->
    
            
    <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>   <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = document.querySelector('.mobile-menu-btn');
            
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        // Reading progress indicator
        function updateReadingProgress() {
            const article = document.querySelector('article');
            const progressBar = document.getElementById('readingProgress');
            
            if (article && progressBar) {
                const articleTop = article.offsetTop;
                const articleHeight = article.offsetHeight;
                const windowHeight = window.innerHeight;
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                const progress = Math.min(100, Math.max(0, 
                    ((scrollTop - articleTop + windowHeight) / articleHeight) * 100
                ));
                
                progressBar.style.width = progress + '%';
            }
        }

        // Smooth scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Share post functionality
        function sharePost() {
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    text: 'Check out this amazing post on SoulVerse!',
                    url: window.location.href
                }).catch(console.error);
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(function() {
                    alert('Post link copied to clipboard!');
                }).catch(function() {
                    alert('Unable to copy link. Please copy manually: ' + window.location.href);
                });
            }
        }

        // Enhanced scroll effects
        window.addEventListener('scroll', function() {
            updateReadingProgress();
            const scrolled = window.pageYOffset;
            const navbar = document.querySelector('.navbar');
            const isDark = document.documentElement.classList.contains('dark');
            if (navbar) {
                if (scrolled > 100) {
                    if (isDark) {
                        navbar.style.background = 'rgba(15, 23, 42, 0.98)';
                        navbar.style.borderBottom = '1px solid rgba(71, 85, 105, 0.2)';
                    } else {
                        navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                        navbar.style.borderBottom = '1px solid rgba(148, 163, 184, 0.1)';
                    }
                    navbar.style.backdropFilter = 'blur(25px)';
                } else {
                    if (isDark) {
                        navbar.style.background = 'rgba(15, 23, 42, 0.95)';
                        navbar.style.borderBottom = '1px solid rgba(71, 85, 105, 0.2)';
                    } else {
                        navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                        navbar.style.borderBottom = '1px solid rgba(148, 163, 184, 0.1)';
                    }
                    navbar.style.backdropFilter = 'blur(20px)';
                }
            }
        });

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

        // Initialize on load
        document.addEventListener('DOMContentLoaded', function() {
            updateReadingProgress();
            
            // Animate elements on scroll
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

            // Observe comment cards for staggered animation            const commentCards = document.querySelectorAll('.card');            commentCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(card);
            });
    </script>
    <!-- Avatar Refresh Script -->
    <script src="<?php echo e(asset('js/avatar-refresh.js')); ?>"></script>
</body>
</html>


<?php /**PATH E:\Vs Code Projects\Laravel Projects\SoulVerse Web App\soulverse\resources\views/posts/show.blade.php ENDPATH**/ ?>