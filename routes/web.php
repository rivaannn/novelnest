<?php


use App\Models\Blogs;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WritterController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PublishersController;
use Illuminate\Support\Facades\Response;

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
    $books = Books::latest()->paginate(6);
    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'books' => $books,
    ]);
})->name('kategori.index');

Route::get('/kategori/detailbuku/{id}', function ($id) {
    $books = Books::find($id);
    return view('kategori.detailbuku', [
        'active' => 'kategori',
        'books' => $books,
    ]);
})->name('kategori.detailbuku');

Route::get('/kategori/search', function (Request $request) {
    $categories = Category::all();

    $searchTerm = $request->get('search');
    $books = Books::with('writter', 'category')
        ->where('title', 'like', '%' . $searchTerm . '%')
        ->latest()
        ->paginate(6);

    if ($request->ajax()) {
        return Response::json($books);
    }

    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'books' => $books,
    ]);
})->name('kategori.search');

Route::get('/kategori/livesearch', function (Request $request) {
    $categories = Category::all();

    $searchQuery = $request->get('search');
    $books = Books::with('writter', 'category')
        ->where('title', 'like', '%' . $searchQuery . '%')
        ->latest()
        ->paginate(6);

    if ($request->ajax()) {
        return response()->json($books);
    }

    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'books' => $books,
    ]);
})->name('kategori.livesearch');


Route::get('/kategori/filter', function (Request $request) {
    $categories = Category::all();

    $validator = Validator::make($request->all(), [
        'kategori' => 'exists:categories,id',
    ]);

    if ($validator->fails()) {
        return redirect()->route('kategori.index')->withErrors($validator)->withInput();
    }

    $booksQuery = Books::query();

    // Filter berdasarkan kategori
    if ($request->has('kategori') && $request->kategori !== '') {
        $booksQuery->whereHas('category', function ($categoryQuery) use ($request) {
            $categoryQuery->where('id', $request->kategori);
        });
    }

    $books = $booksQuery->latest()->paginate(6);

    // Tampilkan pesan jika tidak ada buku
    if ($books->isEmpty()) {
        return redirect()->route('kategori.index')->with('error', 'Tidak ada buku yang sesuai dengan filter.');
    }

    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'books' => $books,
    ]);
})->name('kategori.filter');

Route::get('/kategori/{category}', function ($category) {
    $categories = Category::all();
    $selectedCategory = Category::findOrFail($category);
    $books = $selectedCategory->books()->latest()->paginate(6);

    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'books' => $books,
    ]); { {
        }
    }
})->name('kategori.filterByCategory');

Route::get('/blog', function () {
    $categories = Category::all();
    $blogs = Blogs::latest()->paginate(8);
    return view('blog.index', [
        'active' => 'blog',
        'categories' => $categories,
        'blogs' => $blogs,
    ]);
});

Route::get('/blog/detailblog/{id}', function ($id) {
    $blogs = Blogs::find($id);
    return view('blog.detailblog', [
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

Route::get('/dashboarduser', function () {
    return view('dashboarduser.dashboarduser');
})->middleware(['auth', 'verified'])->name('dashboarduser');

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

Route::get('/writters/create', function () {
    return view('dashboard.writters.create');
});

Route::get('/publishers/create', function () {
    return view('dashboard.publishers.create');
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
    Route::get('/books/book-report-pdf', [PDFController::class, 'generateBookPdfReport']);
    Route::get('/books', [BooksController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BooksController::class, 'show'])->name('books.show');
    Route::get('/books/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/books', [BooksController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::patch('/books/{book}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BooksController::class, 'destroy'])->name('books.destroy');
    Route::get('/search', [BooksController::class, 'search'])->name('books.search');
});

// Route untuk Writtes
Route::middleware(['auth'])->group(function () {
    Route::get('/writters', [WritterController::class, 'index'])->name('writters.index');
    Route::get('/writters/{writter}', [WritterController::class, 'show'])->name('writters.show');
    Route::get('/writters/create', [WritterController::class, 'create'])->name('writters.create');
    Route::post('/writters', [WritterController::class, 'store'])->name('writters.store');
    Route::get('/writters/{writter}/edit', [WritterController::class, 'edit'])->name('writters.edit');
    Route::patch('/writters/{writter}', [WritterController::class, 'update'])->name('writters.update');
    Route::delete('/writters/{writter}', [WritterController::class, 'destroy'])->name('writters.destroy');
});

// Route untuk Publishers
Route::middleware(['auth'])->group(function () {
    Route::get('/publishers', [PublishersController::class, 'index'])->name('publishers.index');
    Route::get('/publishers/{publishers}', [PublishersController::class, 'show'])->name('publishers.show');
    Route::get('/publishers/create', [PublishersController::class, 'create'])->name('publishers.create');
    Route::post('/publishers', [PublishersController::class, 'store'])->name('publishers.store');
    Route::get('/publishers/{publisher}/edit', [PublishersController::class, 'edit'])->name('publishers.edit');
    Route::patch('/publishers/{publisher}', [PublishersController::class, 'update'])->name('publishers.update');
    Route::delete('/publishers/{publisher}', [PublishersController::class, 'destroy'])->name('publishers.destroy');
});


require __DIR__ . '/auth.php';
