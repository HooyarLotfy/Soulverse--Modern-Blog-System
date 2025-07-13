<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\User;

class UserAvatar extends Component
{
    public User $user;
    public string $size;
    public string $class;
    public bool $showImage;

    /**
     * Create a new component instance.
     */
    public function __construct(
        User $user,
        string $size = 'md',
        string $class = '',
        bool $showImage = true
    ) {
        $this->user = $user;
        $this->size = $size;
        $this->class = $class;
        $this->showImage = $showImage;
    }

    /**
     * Get the size classes based on size parameter
     */
    public function getSizeClasses(): string
    {
        return match($this->size) {
            'xs' => 'w-6 h-6 text-xs',
            'sm' => 'w-8 h-8 text-sm',
            'md' => 'w-10 h-10 text-sm',
            'lg' => 'w-16 h-16 text-lg',
            'xl' => 'w-20 h-20 text-xl',
            '2xl' => 'w-32 h-32 text-2xl',
            default => 'w-10 h-10 text-sm'
        };
    }

    /**
     * Get the avatar URL with cache busting
     */
    public function getAvatarUrl(): string
    {
        if (!$this->user->avatar) {
            return '';
        }
        
        return asset('storage/' . $this->user->avatar) . '?v=' . $this->user->updated_at->timestamp;
    }

    /**
     * Get user initials for fallback
     */
    public function getUserInitials(): string
    {
        $name = $this->user->name ?? 'User';
        $parts = explode(' ', trim($name));
        
        if (count($parts) >= 2) {
            return strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
        }
        
        return strtoupper(substr($name, 0, 1));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.user-avatar');
    }
}
