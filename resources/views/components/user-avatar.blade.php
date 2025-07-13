@props([
    'user' => $user,
    'size' => $size ?? 'md',
    'class' => $class ?? '',
    'showImage' => $showImage ?? true
])

<div class="avatar-container {{ $getSizeClasses() }} {{ $class }}" data-avatar-user="{{ $user->id }}">
    @if($showImage && $user->avatar)
        <img 
            src="{{ $getAvatarUrl() }}" 
            alt="{{ $user->name }}'s avatar"
            class="rounded-full object-cover {{ $getSizeClasses() }}"
            data-avatar-user="{{ $user->id }}"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
        >
        <div class="avatar-placeholder rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold {{ $getSizeClasses() }}" 
             style="display: none;"
             data-avatar-user="{{ $user->id }}">
            {{ $getUserInitials() }}
        </div>
    @else
        <div class="avatar-placeholder rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold {{ $getSizeClasses() }}"
             data-avatar-user="{{ $user->id }}">
            {{ $getUserInitials() }}
        </div>
    @endif
</div>
