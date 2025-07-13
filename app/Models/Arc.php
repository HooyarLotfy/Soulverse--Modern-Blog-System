<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arc extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
