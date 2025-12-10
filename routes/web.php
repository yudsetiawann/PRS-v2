<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostDashboardController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
})->name('home');

// Route untuk User melapor (Public/Auth User)
Route::post('/report', [ReportController::class, 'store'])->name('report.store')->middleware('auth');

Route::get('/posts', function () {
    $categoryName = null;
    if (request('category')) {
        $cat = Category::where('slug', request('category'))->first();
        $categoryName = $cat ? $cat->name : null;
    }
    $title = $categoryName ? 'Category: ' . $categoryName : 'All Categories';

    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    return view('posts', ['title' => $title, 'posts' => $posts]);
})->name('posts');

Route::get('/posts/{post:slug}', function (Post $post) {
    // LOGIKA POST VIEWS (Dengan Session agar refresh tidak nambah view berkali-kali)
    $sessionKey = 'post_viewed_' . $post->id;

    if (!session()->has($sessionKey)) {
        $post->increment('views_count'); // Tambah 1 ke database
        session()->put($sessionKey, true); // Simpan tanda di session user
    }

    return view('post', ['title' => 'Single Post', 'post' => $post]);
})->name('post');

Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load('author', 'category');
    return view('posts', ['title' => count($user->posts) . ' Articles by. ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/userprof/{user:username}', function (User $user) {
    $posts = $user->posts()->latest()->paginate(5)->withQueryString();
    return view('userprof', [
        'title' => "Profile: $user->name",
        'user' => $user,
        'posts' => $posts
    ]);
})->name('user.profile');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});

// Route Khusus Komentar (Hanya user login yg bisa komen)
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth');
// Route Like (Hanya user login)
Route::post('/posts/{post:slug}/like', [LikeController::class, 'toggle'])->middleware('auth')->name('posts.like');

// Route Dashboard Admin (Diproteksi Middleware IsAdmin)
Route::middleware(['auth', 'verified', \App\Http\Middleware\IsAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::delete('/admin/posts/{post:slug}', [AdminController::class, 'destroyPost'])->name('admin.posts.destroy');

    // Route Kategori
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::delete('/admin/categories/{category:slug}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');

    // Route Manage Users
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::patch('/admin/users/{user:username}/role', [AdminController::class, 'toggleAdmin'])->name('admin.users.role');
    Route::delete('/admin/users/{user:username}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    // User Management (Update Route Name biar sesuai controller baru)
    Route::patch('/admin/users/{user:username}/role', [AdminController::class, 'toggleRole'])->name('admin.users.role');

    // Reports Routes
    Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::patch('/admin/reports/{report}/solve', [AdminController::class, 'solveReport'])->name('admin.reports.solve');
    Route::delete('/admin/reports/{report}/content', [AdminController::class, 'destroyReportedContent'])->name('admin.reports.destroy_content');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PostDashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [PostDashboardController::class, 'store']);
    Route::get('/dashboard/create', [PostDashboardController::class, 'create']);
    Route::delete('/dashboard/{post:slug}', [PostDashboardController::class, 'destroy']);
    Route::get('/dashboard/{post:slug}/edit', [PostDashboardController::class, 'edit']);
    Route::patch('/dashboard/{post:slug}', [PostDashboardController::class, 'update']);
    Route::get('/dashboard/{post:slug}', [PostDashboardController::class, 'show']);
});

// Route::get('/profile/index', function(Post $posts) {
//     return view('userprof', ['title' => 'Profile', 'posts' => $posts, ProfileController::class, 'show']);
// });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload', [ProfileController::class, 'upload']);
});


require __DIR__ . '/auth.php';
