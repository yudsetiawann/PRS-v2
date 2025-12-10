<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Report;
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
        $categories = Category::latest()
            ->when(request('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
            })
            ->get();

        return view('admin.categories', ['categories' => $categories]);
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
    // 1. MANAJEMEN USER (Update Logika)
    public function users()
    {
        // Super Admin lihat semua, Admin biasa hanya lihat User & Admin lain (tapi dibatasi di View)
        $users = User::where('id', '!=', Auth::id())->latest()->paginate(10);
        return view('admin.users', ['users' => $users]);
    }

    // 2. PROMOTE/DEMOTE (Logic Super Admin)
    public function toggleRole(User $user)
    {
        $currentUser = Auth::user();

        // CEGAH Admin biasa mengutak-atik Admin lain atau Super Admin
        if ($currentUser->role === 'admin' && in_array($user->role, ['admin', 'super_admin'])) {
            return back()->with('error', 'Anda tidak memiliki hak akses untuk mengubah admin ini.');
        }

        // Logika Toggle
        if ($user->role === 'user') {
            $user->update(['role' => 'admin']);
            $msg = 'User dijadikan Admin.';
        } elseif ($user->role === 'admin') {
            // Hanya Super Admin yang bisa demote Admin
            if ($currentUser->role !== 'super_admin') abort(403);
            $user->update(['role' => 'user']);
            $msg = 'Admin diturunkan jadi User.';
        }

        return back()->with('success', $msg);
    }

    public function destroyUser(User $user)
    {
        $currentUser = Auth::user();

        // VALIDASI KETAT
        // 1. Admin tidak bisa hapus Super Admin
        // 2. Admin tidak bisa hapus sesama Admin
        if ($currentUser->role === 'admin' && in_array($user->role, ['admin', 'super_admin'])) {
            return back()->with('error', 'Hanya Super Admin yang bisa menghapus akun Admin.');
        }

        $user->delete(); // Cascade delete post/comment otomatis jalan
        return back()->with('success', 'User berhasil dihapus.');
    }

    // 3. FITUR REPORT
    public function reports()
    {
        $reports = Report::where('status', 'pending')->latest()->paginate(10);
        return view('admin.reports', ['reports' => $reports]);
    }

    public function solveReport(Report $report)
    {
        $report->update(['status' => 'solved']);
        // Atau jika ingin dihapus: $report->delete();
        return back()->with('success', 'Laporan ditandai selesai.');
    }

    // Hapus konten yang dilaporkan (Post/Komen)
    public function destroyReportedContent($id)
    {
        $report = Report::findOrFail($id);

        if ($report->reportable) {
            $report->reportable->delete(); // Hapus Post atau Komen aslinya
            $report->update(['status' => 'solved']);
        }

        return back()->with('success', 'Konten melanggar berhasil dihapus.');
    }
}
