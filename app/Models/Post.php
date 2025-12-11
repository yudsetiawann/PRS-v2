<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $guarded = ['id', 'is_public'];

    protected $with = ['author', 'category'];

    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        // return $this->hasMany(Comment::class);
        return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    }

    public function allComments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reports()
    {
        return $this->morphMany(\App\Models\Report::class, 'reportable');
    }

    // Relasi Many-to-Many ke User (Likes)
    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    // Helper untuk cek apakah post ini sudah dilike oleh user yang sedang login
    public function isLikedBy(User $user)
    {
        return $this->likes->contains('id', $user->id);
    }

    // Opsional: Scope untuk mengambil post public saja (untuk halaman depan)
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhereHas('author', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%');
                });
        });


        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas(
                'category',
                fn(Builder $query) => $query->where('slug', $category)
            );
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereHas(
                'author',
                fn(Builder $query) => $query->where('username', $author)
            );
        });
    }
}
