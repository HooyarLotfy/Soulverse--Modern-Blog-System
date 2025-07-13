

<?php $__env->startSection('title', $user->name . ' - Profile | ' . config('app.name', 'SoulVerse')); ?>
<?php $__env->startSection('description', 'View ' . $user->name . '\'s profile and their posts on SoulVerse'); ?>

<?php $__env->startSection('content'); ?>
<style>
/* Profile Show Styles */
.profile-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: white;
    padding: 4rem 0;
    text-align: center;
}

.profile-hero-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.profile-avatar {
    width: 8rem;
    height: 8rem;
    border-radius: 50%;
    margin: 0 auto 2rem;
    border: 4px solid rgba(255, 255, 255, 0.2);
}

.profile-avatar-placeholder {
    width: 8rem;
    height: 8rem;
    border-radius: 50%;
    margin: 0 auto 2rem;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    font-weight: 700;
    color: white;
}

.profile-name {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
}

.profile-email {
    font-size: 1.125rem;
    opacity: 0.9;
    margin: 0 0 1rem;
}

.profile-bio {
    font-size: 1rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto 2rem;
    line-height: 1.6;
}

.profile-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.main-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 4rem 1.5rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.stat-card {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border: 1px solid var(--gray-200);
}

.dark .stat-card {
    background: var(--gray-800);
    border-color: var(--gray-700);
}

.stat-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 0.75rem;
    margin: 0 auto 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 0.5rem;
    color: var(--gray-800);
}

.dark .stat-number {
    color: var(--gray-100);
}

.stat-label {
    color: var(--gray-600);
    font-size: 0.875rem;
}

.dark .stat-label {
    color: var(--gray-400);
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

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0 0 2rem;
    color: var(--gray-800);
}

.dark .section-title {
    color: var(--gray-100);
}

.post-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.post-item {
    padding: 1.5rem;
    border: 1px solid var(--gray-200);
    border-radius: 0.75rem;
    transition: all 0.3s ease;
}

.dark .post-item {
    border-color: var(--gray-700);
}

.post-item:hover {
    border-color: var(--primary);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.1);
}

.post-title {
    font-size: 1.125rem;
    font-weight: 600;
    margin: 0 0 0.5rem;
    color: var(--gray-800);
}

.dark .post-title {
    color: var(--gray-100);
}

.post-title a {
    color: inherit;
    text-decoration: none;
}

.post-title a:hover {
    color: var(--primary);
}

.post-meta {
    color: var(--gray-500);
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.dark .post-meta {
    color: var(--gray-400);
}

.post-excerpt {
    color: var(--gray-600);
    font-size: 0.875rem;
    line-height: 1.5;
    margin: 0;
}

.dark .post-excerpt {
    color: var(--gray-400);
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--gray-500);
}

.empty-state-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
}

.empty-state-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin: 0 0 0.5rem;
    color: var(--gray-700);
}

.dark .empty-state-title {
    color: var(--gray-300);
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 0.5rem;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
}

.btn-secondary {
    background: white;
    color: var(--primary);
    border: 1px solid var(--primary);
}

.dark .btn-secondary {
    background: var(--gray-800);
    color: var(--primary);
}

.btn-secondary:hover {
    background: var(--primary);
    color: white;
}

@media (max-width: 768px) {
    .profile-hero {
        padding: 3rem 0;
    }

    .profile-name {
        font-size: 2rem;
    }

    .profile-actions {
        flex-direction: column;
        align-items: center;
    }

    .main-content {
        padding: 2rem 1rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Profile Hero -->
<section class="profile-hero">
    <div class="profile-hero-content">
        <?php if($user->avatar): ?>
            <img src="<?php echo e(asset('storage/'.$user->avatar)); ?>" 
                 alt="<?php echo e($user->name); ?>"
                 class="profile-avatar">
        <?php else: ?>
            <div class="profile-avatar-placeholder">
                <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

            </div>
        <?php endif; ?>
        
        <h1 class="profile-name"><?php echo e($user->name); ?></h1>
        <p class="profile-email"><?php echo e($user->email); ?></p>
        
        <?php if($user->bio): ?>
            <p class="profile-bio"><?php echo e($user->bio); ?></p>
        <?php endif; ?>
        
        <?php if(Auth::id() === $user->id): ?>
            <div class="profile-actions">
                <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-secondary">
                    ✏️ Edit Profile
                </a>
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
                    📊 Dashboard
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Main Content -->
<main class="main-content">
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: white;">
                📝
            </div>
            <div class="stat-number"><?php echo e($user->posts->count()); ?></div>
            <div class="stat-label"><?php echo e(Str::plural('Post', $user->posts->count())); ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, var(--secondary) 0%, #0891b2 100%); color: white;">
                💬
            </div>
            <div class="stat-number"><?php echo e($user->comments->count()); ?></div>
            <div class="stat-label"><?php echo e(Str::plural('Comment', $user->comments->count())); ?></div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, var(--accent) 0%, #d97706 100%); color: white;">
                🕒
            </div>
            <div class="stat-number"><?php echo e($user->created_at->diffInDays()); ?></div>
            <div class="stat-label">Days as Member</div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="content-section">
        <h2 class="section-title">Recent Posts</h2>
        
        <?php if($user->posts->count() > 0): ?>
            <div class="post-list">
                <?php $__currentLoopData = $user->posts()->latest()->take(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="post-item">
                        <h3 class="post-title">
                            <a href="<?php echo e(route('posts.show', $post)); ?>">
                                <?php echo e($post->title); ?>

                            </a>
                        </h3>
                        <div class="post-meta">
                            <span><?php echo e($post->created_at->format('M j, Y')); ?></span>
                            <span><?php echo e($post->reactions->count()); ?> reactions</span>
                            <span><?php echo e($post->comments->count()); ?> comments</span>
                            <?php if($post->arc): ?>
                                <span>Arc: <?php echo e($post->arc->title); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if($post->excerpt): ?>
                            <p class="post-excerpt"><?php echo e(Str::limit($post->excerpt, 150)); ?></p>
                        <?php else: ?>
                            <p class="post-excerpt"><?php echo e(Str::limit(strip_tags($post->content), 150)); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <?php if($user->posts->count() > 10): ?>
                <div style="text-align: center; margin-top: 2rem;">
                    <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-primary">
                        View All Posts →
                    </a>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-state-icon">📝</div>
                <h3 class="empty-state-title">No posts yet</h3>
                <p><?php echo e($user->name); ?> hasn't written any posts yet.</p>
                <?php if(Auth::id() === $user->id): ?>
                    <div style="margin-top: 2rem;">
                        <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary">
                            Write Your First Post
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Vs Code Projects\Laravel Projects\SoulVerse Web App\soulverse\resources\views/profile/show.blade.php ENDPATH**/ ?>