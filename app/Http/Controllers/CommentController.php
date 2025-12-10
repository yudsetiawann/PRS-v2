<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|min:3|max:1500',
            'parent_id' => 'nullable|exists:comments,id' // Validasi ID parent
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => $request->body,
            'parent_id' => $request->parent_id // Simpan parent_id
        ]);

        return back()->with('success', 'Comment posted!');
    }

    public function update(Request $request, Comment $comment)
    {
        // 1. Validasi Otorisasi (Hanya pemilik yang boleh edit)
        if ((int) $comment->user_id !== (int) auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // 2. Validasi Input
        $request->validate([
            'body' => 'required|min:3'
        ]);

        // 3. Update Database
        $comment->update([
            'body' => $request->body
        ]);

        return back()->with('success', 'Komentar berhasil diperbarui!');
    }

    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        // Izinkan jika: Pemilik komentar ATAU punya akses Admin (Admin/SuperAdmin)
        if ($comment->user_id == $user->id || $user->hasAdminAccess()) {
            $comment->delete();
            return back()->with('success', 'Komentar dihapus.');
        }

        abort(403, 'Unauthorized action.');
    }
}
