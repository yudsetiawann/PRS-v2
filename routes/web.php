<?php

use App\Http\Controllers\PostDashboardController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
})->name('home');

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

Route::get('/posts/{post:slug}', function(Post $post) {
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
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});


Route::middleware(['auth', 'verified'])->group(function() {
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


require __DIR__.'/auth.php';
