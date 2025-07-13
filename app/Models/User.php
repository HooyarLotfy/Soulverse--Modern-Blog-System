<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
    
    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class);
    }

    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    /**
     * Get the avatar URL with cache busting
     */
    public function getAvatarUrlAttribute()
    {
        if (!$this->avatar) {
            return null;
        }
        
        return asset('storage/' . $this->avatar) . '?v=' . $this->updated_at->timestamp;
    }

    /**
     * Get user initials for avatar fallback
     */
    public function getInitialsAttribute()
    {
        $name = $this->name ?? 'User';
        $parts = explode(' ', trim($name));
        
        if (count($parts) >= 2) {
            return strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
        }
        
        return strtoupper(substr($name, 0, 1));
    }
}

