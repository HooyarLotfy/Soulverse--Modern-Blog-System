<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'body', 'category', 'cover_image', 'user_id', 'is_private', 'arc_id', 'is_public'
    ];

    protected $casts = [
        'is_private' => 'boolean',
        'is_public' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    public function arc()
    {
        return $this->belongsTo(Arc::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}
