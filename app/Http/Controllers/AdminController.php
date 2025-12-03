<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // Manage User
    // 1. TAMPILKAN DAFTAR USER
    public function users()
    {
        return view('admin.users', [
            // Tampilkan semua user, kecuali user yang sedang login (biar gak hapus diri sendiri)
            'users' => User::where('id', '!=', Auth::id())->latest()->paginate(10)
        ]);
    }

    // 2. UBAH ROLE (PROMOTE/DEMOTE)
    public function toggleAdmin(User $user)
    {
        // Toggle nilai boolean (0 jadi 1, 1 jadi 0)
        $user->update([
            'is_admin' => !$user->is_admin
        ]);

        $status = $user->is_admin ? 'dipromosikan jadi Admin' : 'diturunkan jadi User biasa';
        return back()->with('success', "User {$user->name} berhasil {$status}!");
    }

    // 3. HAPUS USER
    public function destroyUser(User $user)
    {
        // 1. Hapus semua komentar user ini (jika ada)
        $user->comments()->delete();

        // 2. Hapus semua postingan user ini
        // Karena kita sudah set relasi posts() di model User
        $user->posts()->delete();

        // 3. Baru hapus usernya
        $user->delete();

        return back()->with('success', 'User dan seluruh datanya berhasil dihapus!');
    }
}
