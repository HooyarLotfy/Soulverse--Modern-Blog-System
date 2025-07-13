@extends('layouts.base')

@section('title', 'Create Arc | ' . config('app.name', 'SoulVerse'))
@section('description', 'Create a new story arc to organize related posts.')

@section('content')
<main class="bg-gray-50 dark:bg-gray-900">
    <div class="container" style="max-width: 800px; margin: 6rem auto 3rem; padding: 0 1rem;">
        <div class="arc-form-container" style="background: white; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05); padding: 2.5rem; margin-bottom: 2rem;" class="dark:bg-gray-800 dark:shadow-2xl">
            <div class="text-center mb-8">
                <h1 style="font-family: var(--font-serif); font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--gray-800);" class="dark:text-white">Create a New Story Arc</h1>
                <p style="color: var(--gray-500);" class="dark:text-gray-400">Group your posts into a cohesive narrative or thematic collection.</p>
            </div>
            
            <form action="{{ route('arcs.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1.5rem;">
                @csrf
                
                <div class="form-group">
                    <label for="title" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--gray-700);" class="dark:text-gray-300">Arc Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--gray-300); border-radius: 0.5rem; font-size: 1rem; transition: all 0.3s ease; color: var(--gray-800);" class="dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="e.g., The Journey of Self-Discovery">
                    @error('title')
                        <div style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="description" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--gray-700);" class="dark:text-gray-300">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--gray-300); border-radius: 0.5rem; font-size: 1rem; transition: all 0.3s ease; color: var(--gray-800); resize: vertical;" class="dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="A brief summary of what this arc is about...">{{ old('description') }}</textarea>
                    @error('description')
                        <div style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="cover_image" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--gray-700);" class="dark:text-gray-300">Cover Image (Optional)</label>
                    <div class="form-file" style="position: relative; display: flex; align-items: center; justify-content: center; border: 2px dashed var(--gray-300); border-radius: 0.5rem; padding: 2rem; cursor: pointer; transition: all 0.3s ease;" class="dark:border-gray-600 hover:border-primary dark:hover:border-primary">
                        <div id="file-upload-prompt" style="text-align: center;">
                            <svg style="width: 3rem; height: 3rem; color: var(--gray-400); margin: 0 auto 1rem;" class="dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p style="color: var(--gray-500); font-weight: 500; margin-bottom: 0.5rem;" class="dark:text-gray-400">Click to upload or drag and drop</p>
                            <p style="color: var(--gray-400); font-size: 0.875rem;" class="dark:text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                        <input type="file" name="cover_image" id="cover_image" accept="image/*" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer;">
                    </div>
                    @error('cover_image')
                        <div style="color: var(--error); font-size: 0.875rem; margin-top: 0.5rem;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div style="display: flex; gap: 1rem; margin-top: 1.5rem; justify-content: flex-end;">
                    <a href="{{ route('arcs.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Arc</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('cover_image');
        const fileUploadBox = document.querySelector('.form-file');
        const fileUploadPrompt = document.getElementById('file-upload-prompt');

        fileUploadBox.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                fileUploadPrompt.innerHTML = `
                    <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; color: var(--success);">
                        <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span style="font-weight: 500;">${file.name}</span>
                    </div>
                `;
            }
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            fileUploadBox.addEventListener(eventName, () => fileUploadBox.classList.add('border-primary'), false);
        });
        ['dragleave', 'drop'].forEach(eventName => {
            fileUploadBox.addEventListener(eventName, () => fileUploadBox.classList.remove('border-primary'), false);
        });
    });
</script>
@endpush




