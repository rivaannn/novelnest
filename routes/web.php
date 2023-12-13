<?php


use App\Models\Blogs;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Untuk Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about.index', [
        'title' => 'Tentang NovelNest',
        'active' => 'about'
    ]);
});
Route::get('/kategori', function () {
    $categories = Category::all();
    $books = Books::latest()->paginate(5);
    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'books' => $books,
    ]);
});

Route::get('/kategori/detailbuku/{id}', function ($id) {
    $books = Books::find($id);
    return view('kategori.detailbuku', [
        'active' => 'kategori',
        'books' => $books,
    ]);
});


Route::get('/blog', function () {
    $blogs = Blogs::all();
    return view('blog.index', [
        'active' => 'blog',
        'blogs' => $blogs,
    ]);
});

Route::get('/auth', function () {
    return view('auth.login');
});

Route::get('/auth', function () {
    return view('auth.register');
});
// Untuk redirect ke Google
Route::get('login/google/redirect', [SocialiteController::class, 'redirect'])
    ->middleware(['guest'])
    ->name('redirect');

// Untuk callback dari Google
Route::get('login/google/callback', [SocialiteController::class, 'callback'])
    ->middleware(['guest'])
    ->name('callback');

// Untuk logout
Route::post('logout', [SocialiteController::class, 'logout'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users/create', function () {
    return view('dashboard.users.create');
});

Route::get('/books/create', function () {
    return view('dashboard.books.create');
});

Route::get('/blogs/create', function () {
    return view('dashboard.blogs.create');
});

// Route Untuk Users
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});

// Route Untuk Blog
Route::middleware(['auth'])->group(function () {
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/{blog}', [BlogsController::class, 'show'])->name('blogs.show');
    Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogsController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::patch('/blogs/{blog}', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogsController::class, 'destroy'])->name('blogs.destroy');
});

// Route Untuk Books
Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::patch('/books/{book}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');
});


require __DIR__ . '/auth.php';