<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['user_id', 'post_id', 'body', 'parent_id']; // Pastikan parent_id ada
    protected $guarded = ['id'];
    protected $with = ['user']; // Eager load user biar query ringan

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Anak (Balasan)
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Relasi ke Induk (Komentar yang dibalas)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function reports()
    {
        return $this->morphMany(\App\Models\Report::class, 'reportable');
    }
}
