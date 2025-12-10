<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
            'type' => 'required|in:post,comment', // Tentukan tipe
            'id' => 'required|integer'
        ]);

        $model = $request->type === 'post' ? \App\Models\Post::class : \App\Models\Comment::class;
        $target = $model::findOrFail($request->id);

        $target->reports()->create([
            'user_id' => auth()->id(),
            'reason' => $request->reason
        ]);

        return back()->with('success', 'Laporan berhasil dikirim. Terima kasih.');
    }
}
