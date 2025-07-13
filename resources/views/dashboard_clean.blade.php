@extends('layouts.base')

@section('title', 'Dashboard | ' . config('app.name', 'SoulVerse'))
@section('description', 'Your personal dashboard on SoulVerse - manage your posts, view analytics, and create new content.')

@section('content')
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
    background: linear-gradient(135deg, #ffffff 0%, rgba(255,255,255,0.8) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
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
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
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

    .actions-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .content-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .main-content {
        padding: 2rem 1rem;
    }
}
</style>

<!-- Dashboard Hero -->
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

            <!-- Quick Links -->
            <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--gray-200);">
                <h3 style="margin: 0 0 1rem; color: var(--gray-800); font-size: 1.125rem;">Quick Links</h3>
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <a href="{{ route('profile.edit') }}" style="color: var(--primary); text-decoration: none; font-weight: 500; transition: color 0.3s ease;">Edit Profile</a>
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('posts.create') }}" style="color: var(--primary); text-decoration: none; font-weight: 500; transition: color 0.3s ease;">Create New Post</a>
                    @endif
                    <a href="{{ route('arcs.create') }}" style="color: var(--primary); text-decoration: none; font-weight: 500; transition: color 0.3s ease;">Create New Arc</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


