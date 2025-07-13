@extends('layouts.base')

@section('title', 'Edit Profile | ' . config('app.name', 'SoulVerse'))
@section('description', 'Edit your SoulVerse profile - update your bio, avatar, and personal information.')

@section('content')
<style>
/* Profile Edit Styles */
.profile-hero {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: white;
    padding: 3rem 0;
    text-align: center;
}

.profile-hero-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.profile-title {
    font-family: var(--font-serif);
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0 0 1rem;
}

.profile-subtitle {
    font-size: 1.125rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

.main-content {
    max-width: 800px;
    margin: 0 auto;
    padding: 4rem 1.5rem;
}

.form-section {
    background: white;
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border: 1px solid var(--gray-200);
}

.dark .form-section {
    background: var(--gray-800);
    border-color: var(--gray-700);
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0 0 1.5rem;
    color: var(--gray-800);
}

.dark .section-title {
    color: var(--gray-100);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-weight: 500;
    margin-bottom: 0.5rem;
    color: var(--gray-700);
}

.dark .form-label {
    color: var(--gray-300);
}

.form-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1px solid var(--gray-300);
    border-radius: 0.5rem;
    font-size: 1rem;
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
    box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
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

.btn-danger {
    background: linear-gradient(135deg, var(--error) 0%, #dc2626 100%);
    color: white;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
}

.alert {
    padding: 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1.5rem;
}

.alert-success {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.alert-error {
    background: rgba(239, 68, 68, 0.1);
    color: var(--error);
    border: 1px solid rgba(239, 68, 68, 0.2);
}

.danger-zone {
    border: 2px solid var(--error);
    border-radius: 1rem;
    padding: 2rem;
    margin-top: 3rem;
}

.danger-zone .section-title {
    color: var(--error);
}

@media (max-width: 768px) {
    .profile-title {
        font-size: 2rem;
    }

    .main-content {
        padding: 2rem 1rem;
    }

    .form-section {
        padding: 1.5rem;
    }
}
</style>

<!-- Profile Hero -->
<section class="profile-hero">
    <div class="profile-hero-content">
        <h1 class="profile-title">Edit Profile</h1>
        <p class="profile-subtitle">
            Update your information and customize your SoulVerse experience
        </p>
    </div>
</section>

<!-- Main Content -->
<main class="main-content">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    <!-- Profile Information -->
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="form-section">
        @csrf
        @method('put')

        <h2 class="section-title">Profile Information</h2>

        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name', $user->name) }}" 
                class="form-input" 
                required 
                autocomplete="name"
            >
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email', $user->email) }}" 
                class="form-input" 
                required 
                autocomplete="username"
            >
        </div>

        <div class="form-group">
            <label for="bio" class="form-label">Bio</label>
            <textarea 
                id="bio" 
                name="bio" 
                class="form-input form-textarea" 
                placeholder="Tell us about yourself..."
            >{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div class="form-group">
            <label for="avatar" class="form-label">Avatar</label>
            
            <!-- Current Avatar Preview -->
            @if($user->avatar)
                <div class="current-avatar-preview" style="margin-bottom: 1rem;">
                    <img src="{{ $user->avatar_url }}" 
                         alt="Current avatar" 
                         style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid var(--gray-200);"
                         id="current-avatar-preview"
                         data-avatar-user="{{ $user->id }}">
                    <p style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--gray-600);">
                        Current avatar
                    </p>
                </div>
            @endif
            
            <!-- New Avatar Preview -->
            <div id="new-avatar-preview" style="display: none; margin-bottom: 1rem;">
                <img id="preview-image" 
                     style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid var(--primary);">
                <p style="margin-top: 0.5rem; font-size: 0.875rem; color: var(--primary);">
                    New avatar preview
                </p>
            </div>
            
            <input 
                type="file" 
                id="avatar" 
                name="avatar" 
                class="form-input" 
                accept="image/*"
                onchange="previewAvatar(this)"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            💾 Save Changes
        </button>
    </form>
    
    <script>
    function previewAvatar(input) {
        const previewDiv = document.getElementById('new-avatar-preview');
        const previewImg = document.getElementById('preview-image');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewDiv.style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        } else {
            previewDiv.style.display = 'none';
        }
    }
    </script>

    <!-- Update Password -->
    <form method="POST" action="{{ route('password.update') }}" class="form-section">
        @csrf
        @method('put')

        <h2 class="section-title">Update Password</h2>

        <div class="form-group">
            <label for="current_password" class="form-label">Current Password</label>
            <input 
                type="password" 
                id="current_password" 
                name="current_password" 
                class="form-input" 
                autocomplete="current-password"
            >
        </div>

        <div class="form-group">
            <label for="password" class="form-label">New Password</label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-input" 
                autocomplete="new-password"
            >
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                class="form-input" 
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            🔐 Update Password
        </button>
    </form>

    <!-- Delete Account -->
    <div class="danger-zone">
        <h2 class="section-title">Delete Account</h2>
        <p style="margin-bottom: 1.5rem; color: var(--gray-600);">
            Once your account is deleted, all of its resources and data will be permanently deleted. 
            Before deleting your account, please download any data or information that you wish to retain.
        </p>
        
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
            @csrf
            @method('delete')

            <div class="form-group">
                <label for="password_delete" class="form-label">Password</label>
                <input 
                    type="password" 
                    id="password_delete" 
                    name="password" 
                    class="form-input" 
                    placeholder="Confirm your password to delete account"
                    required
                >
            </div>

            <button type="submit" class="btn btn-danger">
                🗑️ Delete Account
            </button>
        </form>
    </div>
</main>

<script src="{{ asset('js/avatar-refresh.js') }}"></script>
@if(session('avatar-updated'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Trigger avatar update event
    const event = new CustomEvent('avatar-updated', {
        detail: {
            userId: '{{ session('user-id') }}',
            avatarPath: '{{ session('avatar-path') }}',
            userName: '{{ session('user-name') }}',
            timestamp: '{{ now()->timestamp }}'
        }
    });
    document.dispatchEvent(event);
    
    // Show success message
    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-success';
    alertDiv.style.position = 'fixed';
    alertDiv.style.top = '20px';
    alertDiv.style.right = '20px';
    alertDiv.style.zIndex = '9999';
    alertDiv.innerHTML = '✅ Avatar updated successfully!';
    document.body.appendChild(alertDiv);
    
    setTimeout(() => {
        alertDiv.remove();
    }, 3000);
});
</script>
@endif
@endsection
