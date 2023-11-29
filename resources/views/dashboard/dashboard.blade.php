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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <!-- Card Buku -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Jumlah Buku</h3>
                    <p class="text-2xl font-bold text-indigo-600">10</p>
                    <x-elongated-button href="#">Detail</x-elongated-button>
                    <!-- Isi konten tambahan di sini -->
                </div>
                <!-- Card Blog -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Jumlah Blog</h3>
                    <p class="text-2xl font-bold text-indigo-600">10</p>
                    <x-elongated-button href="#">Detail</x-elongated-button>
                    <!-- Isi konten tambahan di sini -->
                </div>
                <!-- Card Penulis -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Jumlah Penulis</h3>
                    <p class="text-2xl font-bold text-indigo-600">10</p>
                    <x-elongated-button href="#">Detail</x-elongated-button>
                    <!-- Isi konten tambahan di sini -->
                </div>

                <!-- Card Pengguna -->
                <div class="p-6 transition-transform transform bg-white rounded-lg shadow-md hover:scale-105">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Jumlah Pengguna</h3>
                    <p class="text-2xl font-bold text-indigo-600">{{ \App\Models\User::count() }}</p>
                    <x-elongated-button href="{{ route('users.index') }}">Detail</x-elongated-button>
                    <!-- Isi konten tambahan di sini -->
                </div>

                <!-- ... -->
            </div>
        </div>
    </div>
</x-app-layout>
