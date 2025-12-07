<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    protected static function booted()
    {
        static::creating(function ($category) {
            // Cek apakah slug kosong, jika ya, buat dari name
            if (empty($category->slug)) {
                // Ubah & jadi dan
                $text = str_replace('&', 'dan', $category->name);
                // Buat slug
                $category->slug = Str::slug($text);
            }
        });
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
