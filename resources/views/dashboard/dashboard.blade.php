<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span class="text-md">Selamat Datang Kembali, </span>
                    {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center justify-center grid-cols-2 gap-4 md:grid-cols-3">
                <!-- Card Buku -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-200">Jumlah Buku</h3>
                    <p class="text-2xl font-bold text-center text-blue-600">{{ App\Models\Books::count() }}</p>
                    <x-elongated-button href="{{ route('books.index') }}">
                        Detail</x-elongated-button>
                </div>
                <!-- Card Blog -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-200">Jumlah Blog</h3>
                    <p class="text-2xl font-bold text-center text-blue-600">{{ App\Models\Blogs::count() }}</p>
                    <x-elongated-button href="{{ route('blogs.index') }}">Detail</x-elongated-button>
                </div>

                <!-- Card Penulis -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-200">Jumlah Penulis</h3>
                    <p class="text-2xl font-bold text-center text-blue-600">{{ App\Models\Writter::count() }}</p>
                    <x-elongated-button href="{{ route('writters.index') }}">Detail</x-elongated-button>
                </div>

                <!-- Card Order -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-200">Jumlah Order</h3>
                    <p class="text-2xl font-bold text-center text-blue-600">10</p>
                    <x-elongated-button href="#">Detail</x-elongated-button>
                </div>

                <!-- Card Pengguna -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-200">Jumlah Pengguna</h3>
                    <p class="text-2xl font-bold text-center text-blue-600">{{ \App\Models\User::count() }}</p>
                    <x-elongated-button href="{{ route('users.index') }}">Detail</x-elongated-button>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>
