<?php


use App\Models\Blogs;
use App\Models\Books;
use App\Models\Category;
use App\Models\Writter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WritterController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PublishersController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

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
Route::get('/kategori', function (Request $request) {
    $categories = Category::all();
    $writters = Writter::all();
    $books = Books::latest()->paginate(6);
    $keranjangBuku = Books::find($request->session()->get('books'));
    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'books' => $books,
        'writters' => $writters,
        'request' => $request,
        'keranjangBuku' => $keranjangBuku
    ]);
})->name('kategori.index');

// Route untuk Keranjang
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/keranjang', [BooksController::class, 'keranjangIndex'])->name('keranjang.index');
    Route::post('/keranjang', [BooksController::class, 'addKeranjang'])->name('addKeranjang');
    Route::get('/removekeranjang', [BooksController::class, 'removeFromKeranjang'])->name('remKeranjang');
});

// order
Route::middleware(['auth'])->group(function() {
    Route::post('/order-keranjang',[OrdersController::class, 'buatOrderDariKeranjang'])->name('order.keranjang');
});


Route::get('/order', function () {
    return view('dashboarduser.order');
})->middleware(['auth', 'verified'])->name('order');

Route::get('/kategori/detailbuku/{id}', function ($id, Request $request) {
    $books = Books::find($id);
    $request->session()->all();
    $keranjangBuku = Books::find($request->session()->get('books'));
    return view('kategori.detailbuku', [
        'active' => 'kategori',
        'books' => $books,
        'request' => $request,
        'keranjangBuku' => $keranjangBuku

    ]);
})->name('kategori.detailbuku');

Route::get('/kategori/search', function (Request $request) {
    $categories = Category::all();
    $writters = Writter::all();

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
        'writters' => $writters,

    ]);
})->name('kategori.search');


Route::get('/kategori/filter', function (Request $request) {
    // Mengambil semua kategori
    $categories = Category::all();

    // Mengambil semua penulis
    $writters = Writter::all();

    // Filter Berdasarkan Category
    $selectedCategoryId = $request->get('category');
    $selectedCategory = Category::find($selectedCategoryId);

    // Filter Berdasarkan Penulis
    $selectedWritterId = $request->get('writter');
    $selectedWritter = Writter::find($selectedWritterId);

    // Mengambil semua buku
    $booksQuery = Books::query();

    if ($selectedCategory) {
        // Jika kategori dipilih, filter berdasarkan kategori
        $booksQuery->where('category_id', $selectedCategoryId);
    }

    if ($selectedWritter) {
        // Jika penulis dipilih, filter berdasarkan penulis
        $booksQuery->where('writter_id', $selectedWritterId);
    }

    // Filter Berdasarkan Harga
    $minPrice = substr($request->get('harga_min'), 4, 20);
    $maxPrice = substr($request->get('harga_max'), 4, 20);

    $minPrice = (int) str_replace('.', '', $minPrice);
    $maxPrice = (int) str_replace('.', '', $maxPrice);

    if ($minPrice && $maxPrice) {
        // Jika harga_min dan harga_max terisi, filter berdasarkan harga
        $booksQuery->whereBetween('price', [$minPrice, $maxPrice]);
    } elseif ($minPrice) {
        // Jika hanya harga_min saja yang terisi, filter berdasarkan harga
        $booksQuery->where('price', '>=', $minPrice);
    } elseif ($maxPrice) {
        // Jika hanya harga_max saja yang terisi, filter berdasarkan harga
        $booksQuery->where('price', '<=', $maxPrice);
    }


    // Mengambil data buku setelah dilakukan filter
    $books = $booksQuery->latest()->paginate(10);

    // Notifikasi Ketika Buku tidak ada
    if ($books->isEmpty()) {
        session()->flash('error', 'Tidak ada buku yang ditemukan');
    }

    return view('kategori.index', [
        'active' => 'kategori',
        'categories' => $categories,
        'writters' => $writters,
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
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::get('/dashboarduser', function () {
    return view('dashboarduser.dashboarduser');
})->middleware(['auth', 'verified'])->name('dashboarduser');

// Route::get('/keranjang', function () {
//     return view('dashboarduser.keranjang');
// })->middleware(['auth', 'verified'])->name('keranjang');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['admin']);
    Route::get('/profile-user', [ProfileController::class, 'editUser'])->name('profileUser.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile-user', [ProfileController::class, 'updateUser'])->name('profileUser.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile-user', [ProfileController::class, 'destroyUser'])->name('profileUser.destroy');
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
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users/book-report-pdf', [PDFController::class, 'generateUserPdfReport']);
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});

// Route Untuk Blog
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/{blog}', [BlogsController::class, 'show'])->name('blogs.show');
    Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogsController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{blog}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::patch('/blogs/{blog}', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogsController::class, 'destroy'])->name('blogs.destroy');
});

// Route Untuk Books
Route::middleware(['auth', 'admin'])->group(function () {
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
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/writters', [WritterController::class, 'index'])->name('writters.index');
    Route::get('/writters/{writter}', [WritterController::class, 'show'])->name('writters.show');
    Route::get('/writters/create', [WritterController::class, 'create'])->name('writters.create');
    Route::post('/writters', [WritterController::class, 'store'])->name('writters.store');
    Route::get('/writters/{writter}/edit', [WritterController::class, 'edit'])->name('writters.edit');
    Route::patch('/writters/{writter}', [WritterController::class, 'update'])->name('writters.update');
    Route::delete('/writters/{writter}', [WritterController::class, 'destroy'])->name('writters.destroy');
});

// Route untuk Publishers
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/publishers', [PublishersController::class, 'index'])->name('publishers.index');
    Route::get('/publishers/{publishers}', [PublishersController::class, 'show'])->name('publishers.show');
    Route::get('/publishers/create', [PublishersController::class, 'create'])->name('publishers.create');
    Route::post('/publishers', [PublishersController::class, 'store'])->name('publishers.store');
    Route::get('/publishers/{publisher}/edit', [PublishersController::class, 'edit'])->name('publishers.edit');
    Route::patch('/publishers/{publisher}', [PublishersController::class, 'update'])->name('publishers.update');
    Route::delete('/publishers/{publisher}', [PublishersController::class, 'destroy'])->name('publishers.destroy');
});


require __DIR__ . '/auth.php';