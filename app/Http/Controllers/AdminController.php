<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // 1. DASHBOARD UTAMA ADMIN
    public function index()
    {
        // Menampilkan SEMUA post dari semua user
        return view('admin.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    // 2. HAPUS POSTINGAN (Bebas hapus punya siapa saja)
    public function destroyPost(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post has been deleted by Admin!');
    }

    // 3. MANAJEMEN KATEGORI (Index & Create)
    public function categories()
    {
        return view('admin.categories', [
            'categories' => Category::all()
        ]);
    }

    // 4. STORE KATEGORI BARU
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'color' => 'bg-gray-500' // Default color, bisa dibuat dinamis nanti
        ]);

        return back()->with('success', 'New category added!');
    }

    // 5. DELETE KATEGORI
    public function destroyCategory(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted!');
    }
}
