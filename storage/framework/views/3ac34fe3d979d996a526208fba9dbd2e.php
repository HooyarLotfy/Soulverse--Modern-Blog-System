

<?php $__env->startSection('title', 'Edit Post | ' . config('app.name', 'SoulVerse')); ?>
<?php $__env->startSection('description', 'Edit your post: ' . $post->title); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <style>
        .trix-button-group--file-tools { display: none !important; }
        trix-editor {
            background-color: white;
            border-radius: 0.5rem;
            border-color: var(--gray-300);
            min-height: 300px;
        }
        .dark trix-editor {
            background-color: var(--gray-700);
            border-color: var(--gray-600);
            color: var(--gray-100);
        }
        .dark .trix-toolbar .trix-button {
            background: var(--gray-800);
        }
        .dark .trix-toolbar .trix-button:not(:disabled) {
            fill: var(--gray-300);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="bg-gray-50 dark:bg-gray-900 py-12">
    <div class="container" style="max-width: 900px; margin: 2rem auto; padding: 0 1rem;">
        <div class="form-container bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold font-serif text-gray-800 dark:text-white">Edit Post</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-2">Refine your story and share your updates.</p>
            </div>

            <form action="<?php echo e(route('posts.update', $post)); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                
                <div>
                    <label for="title" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Title</label>
                    <input type="text" name="title" id="title" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="<?php echo e(old('title', $post->title)); ?>" required>
                </div>

                <div>
                    <label for="body" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Content</label>
                    <input id="body" type="hidden" name="body" value="<?php echo e(old('body', $post->body)); ?>">
                    <trix-editor input="body"></trix-editor>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="category" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Category</label>
                        <input type="text" name="category" id="category" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="<?php echo e(old('category', $post->category)); ?>" placeholder="e.g., Life Arc, Tech">
                    </div>
                    <div>
                        <label for="arc_id" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Story Arc (Optional)</label>
                        <select name="arc_id" id="arc_id" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="">None</option>
                            <?php $__currentLoopData = $arcs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($arc->id); ?>" <?php echo e(old('arc_id', $post->arc_id) == $arc->id ? 'selected' : ''); ?>><?php echo e($arc->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="cover_image" class="block mb-2 font-semibold text-gray-700 dark:text-gray-300">Cover Image</label>
                    <?php if($post->cover_image): ?>
                        <div class="mb-4">
                            <img src="<?php echo e(asset('storage/' . $post->cover_image)); ?>" alt="Current cover image" class="rounded-lg max-w-xs">
                            <p class="text-sm text-gray-500 mt-2">Current image. Upload a new one to replace it.</p>
                        </div>
                    <?php endif; ?>
                    <input type="file" name="cover_image" id="cover_image" class="w-full text-gray-700 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary dark:file:bg-primary/20 dark:file:text-primary-light hover:file:bg-primary/20">
                </div>

                <div class="flex justify-end gap-4 pt-4">
                    <a href="<?php echo e(route('posts.show', $post)); ?>" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">✨ Update Post</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('scripts'); ?>
    document.querySelector('.form-file').addEventListener('click', function() {
        document.getElementById('image').click();
    });
    
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            const fileDiv = document.querySelector('.form-file');
            fileDiv.innerHTML = `
                <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                    <svg style="width: 1.5rem; height: 1.5rem; color: var(--success);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span style="color: var(--success); font-weight: 500;">${file.name}</span>
                </div>
            `;
        }
    });

    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();
        const body = document.getElementById('body').value.trim();
        
        if (!title || !body) {
            e.preventDefault();
            alert('Please fill in all required fields.');
            return false;
        }
        
        if (title.length < 3) {
            e.preventDefault();
            alert('Title must be at least 3 characters long.');
            return false;
        }
        
        if (body.length < 10) {
            e.preventDefault();
            alert('Content must be at least 10 characters long.');
            return false;
        }
    });
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Vs Code Projects\Laravel Projects\SoulVerse Web App\soulverse\resources\views/posts/edit.blade.php ENDPATH**/ ?>