@extends('layouts.main')

@section('content')
    <!-- Filter Section -->
    <div class="container flex flex-wrap py-12 mx-auto mt-8 dark:bg-gray-800">
        <div class="w-full pr-4 mb-8 md:w-1/4 md:mb-0">
            <!-- Filter Options -->
            <div class="mb-4 ">
                <h2 class="mb-2 text-2xl font-semibold dark:text-white">Filter Kategori</h2>

                <form class="grid grid-flow-row-dense" action="{{ route('kategori.filter') }}" method="get">
                    @csrf
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                        Buku</label>
                    <select id="kategori" name="kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <!-- Price Range -->
                    <div class="mt-4 mb-5">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                            Minimum</label>
                        <!-- Tambahkan elemen input untuk harga minimum -->
                        <input type="text" id="base-input" name="harga_minimum"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Rp.">

                        <label for="base-input"
                            class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Maksimum</label>
                        <!-- Tambahkan elemen input untuk harga maksimum -->
                        <input type="text" id="base-input" name="harga_maksimum"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Rp.">
                    </div>

                    <!-- Apply Filter Button -->
                    <button type="submit"
                        class="text-blue-700 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Terapkan
                        Filter</button>
                </form>
                {{-- Reset Filter  --}}
                <form class="grid grid-flow-row-dense" action="{{ url('/kategori') }}" method="get">
                    @csrf
                    <button type="submit"
                        class="text-blue-700 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Reset
                        Filter</button>
                </form>
            </div>
        </div>



        <!-- Product Section -->
        <div class="w-full md:w-3/4">
            <nav class="flex items-center justify-center p-4">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="relative px-6 py-8 overflow-hidden text-center bg-white isolate sm:px-16 sm:shadow-sm dark:bg-transparent">
                        <p
                            class="max-w-2xl mx-auto text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">
                            Cari buku menarik hanya di NovelNest ...
                        </p>

                        <form action="/kategori/search" method="get">
                            <label
                                class="relative flex flex-col items-center justify-center max-w-2xl gap-2 px-2 py-2 mx-auto mt-8 bg-white border shadow-2xl min-w-sm md:flex-row rounded-2xl focus-within:border-gray-300 dark:bg-gray-800"
                                for="search-bar">

                                <input id="search-bar" placeholder="cari buku disini" name="search"
                                    class="flex-1 w-full px-6 py-2 bg-white rounded-md outline-none">
                                <button type="submit"
                                    class="relative w-full px-6 py-3 overflow-hidden text-white transition-all duration-100 bg-black border border-black md:w-auto fill-white active:scale-95 will-change-transform rounded-xl">
                                    <div class="flex items-center transition-all opacity-1">
                                        <span class="mx-auto text-sm font-semibold truncate whitespace-nowrap">
                                            Search
                                        </span>
                                    </div>
                                </button>
                            </label>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Product List -->
            <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($books as $book)
                    @if ($loop->iteration > 9)
                    @break
                @endif
                <a href="/kategori/detailbuku/{{ $book->id }}"
                    class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg  dark:bg-gray-700">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book/{{ $book->id }}" alt="Nama Produk">
                    <h3 class="text-lg font-semibold dark:text-white">{{ $book->title }}</h3>
                    <p class="text-gray-700 dark:text-white">Penulis: {{ $book->writter->name }}</p>
                    <p class="text-lg pt-2 text-blue-700">{{ 'RP.' . number_format($book->price, 2, ',', '.') }} <span
                            class="inline-block float-right px-2 py-1 text-xs tracking-wide text-white bg-blue-500 rounded">{{ $book->category->name }}</span>
                    </p>
                </a>
            @endforeach
        </div>

        {{-- Jika tidak ada buku yang sesuai dengan filter --}}
        @if ($books->isEmpty())
            <div class="flex flex-col items-center justify-center mt-8">
                <h2 class="text-2xl font-semibold">Buku tidak ditemukan</h2>
                <p class="text-gray-700">Buku yang anda cari tidak ditemukan, silahkan cari buku lainnya.</p>
            </div>
        @endif

        {{-- Pagination --}}
        <div class="flex justify-between mt-8 items-between pb-36 ">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection
