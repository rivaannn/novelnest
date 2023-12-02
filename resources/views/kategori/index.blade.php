@extends('layouts.main')

@section('content')
    <!-- Filter Section -->
    <div class="container flex flex-wrap py-12 mx-auto mt-8">
        <div class="w-full pr-4 mb-8 md:w-1/4 md:mb-0">
            <!-- Filter Options -->
            <div class="mb-4">
                <h2 class="mb-2 text-xl font-semibold">Filter Kategori</h2>
                <!-- Dropdown for International Buku -->
                <div class="mb-2">
                    <label for="kategori" class="block text-gray-700">Kategori Buku</label>
                    <select id="kategori" name="kategori" class="w-full px-3 py-2 border rounded">
                        <!-- Add options as needed -->
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                    </select>
                </div>
                <!-- Price Range -->
                <div class="mb-2">
                    <label for="minPrice" class="block text-gray-700">Harga Minimum</label>
                    <input type="text" id="minPrice" name="minPrice" class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-2">
                    <label for="maxPrice" class="block text-gray-700">Harga Maksimum</label>
                    <input type="text" id="maxPrice" name="maxPrice" class="w-full px-3 py-2 border rounded">
                </div>
                <!-- Apply Filter Button -->
                <button class="px-4 py-2 text-white bg-blue-500 rounded">Terapkan Filter</button>
            </div>
        </div>

        <!-- Product Section -->
        <div class="w-full md:w-3/4">
            <!-- Navbar -->
            <nav class="flex items-center justify-between p-4 bg-white border-b">
                <div>
                    <a href="#" class="mr-4 hover:text-blue-500">Home</a>
                    <a href="#" class="mr-4 hover:text-blue-500">Tentang Kami</a>
                    <a href="#" class="hover:text-blue-500">Kategori Buku</a>
                </div>
                <!-- Sorting Options -->
                <div class="flex items-center">
                    <label for="sort" class="mr-2">Sortir:</label>
                    <select id="sort" name="sort" class="px-3 py-2 border rounded">
                        <option value="terbaru">Terbaru</option>
                        <option value="harga-tinggi">Harga Tinggi</option>
                        <option value="harga-rendah">Harga Rendah</option>
                        <option value="terpopuler">Terpopuler</option>
                    </select>
                </div>
            </nav>

            <!-- Product List -->
            <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3">
                <!-- Example Product Card -->
                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>
                <!-- Repeat the above card structure for each product -->
                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>

                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>

                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>

                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>

                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>

                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>

                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>

                <a href="#" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book" alt="Nama Produk">
                    <h3 class="text-lg font-semibold">Nama Produk</h3>
                    <p class="text-gray-700">Penulis: Penulis Produk</p>
                    <p class="text-gray-700">Harga: Rp 100.000</p>
                </a>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <!-- Add pagination links here -->
                <span class="px-4 py-2 mr-2 border rounded">1</span>
                <span class="px-4 py-2 mr-2 border rounded">2</span>
                <span class="px-4 py-2 mr-2 border rounded">3</span>
                <!-- Add more pagination links as needed -->
            </div>
        </div>
    </div>
@endsection
