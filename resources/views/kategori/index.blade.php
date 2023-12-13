@extends('layouts.main')

@section('content')
    <!-- Filter Section -->
    <div class="container flex flex-wrap py-12 mx-auto mt-8">
        <div class="w-full pr-4 mb-8 md:w-1/4 md:mb-0">
            <!-- Filter Options -->
            <div class="mb-4">
                <h2 class="mb-2 text-2xl font-semibold">Filter Kategori</h2>

                <form class="max-w-sm mx-auto mt-8">
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre
                        Buku</label>
                    <select id="kategori" name="kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option>Romantis</option>
                        <option>Komedi</option>
                        <option>Aksi</option>
                        <option>Sejarah</option>
                    </select>
                </form>

                <!-- Price Range -->
                <div class="mt-4 mb-5">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        Minimum</label>
                    <input type="text" id="base-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Rp.">
                    <label for="base-input" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                        Maksimum</label>
                    <input type="text" id="base-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Rp.">
                </div>
                <!-- Apply Filter Button -->
                <button type="submit"
                    class="text-blue-700 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Terapkan
                    Filter</button>
            </div>
        </div>

        <!-- Product Section -->
        <div class="w-full md:w-3/4">
            <!-- Navbar -->
            <nav class="flex items-center justify-between p-4 bg-white border-b">
                <!-- Sorting Options -->
                <form class="flex items-center">
                    <label for="sort" class="text-gray-900 me-4 text-md dark:text-white">Sortir:</label>
                    <select id="sort"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="terbaru">Terbaru</option>
                        <option value="harga-tinggi">Harga Tinggi</option>
                        <option value="harga-rendah">Harga Rendah</option>
                        <option value="terpopuler">Terpopuler</option>
                    </select>
                </form>

            </nav>
            {{-- Kategori --}}
            <div class="container mx-auto mt-8">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-6">
                    <!-- Kategori 1 -->
                    @foreach ($categories as $category)
                        <div class="flex flex-col items-center">
                            <a href="#" class="bg-gray-200 w-full rounded text-gray-600">
                                <p class="text-xl text-center">{{ $category->name }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Product List -->
            <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($books as $book)
                    <!-- Example Product Card -->
                    <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                        <img class="object-cover object-center w-full h-48 mb-2"
                            src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                        <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                        <p class="text-gray-700">Penulis: {{ $book->writter->name }}</p>
                        <p class="text-blue-700 text-lg">{{ 'RP.' . number_format($book->price, 2, ',', '.') }}</p>
                    </a>
                @endforeach
            </div>
            <!-- Pagination -->


        </div>
    </div>
@endsection
