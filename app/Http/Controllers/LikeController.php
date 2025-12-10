<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $user = Auth::user();

        // Fitur Toggle bawaan Laravel (Attach jika belum ada, Detach jika sudah ada)
        $post->likes()->toggle($user->id);

        return back(); // Kembali ke halaman sebelumnya tanpa pesan (agar seamless)
    }
}
