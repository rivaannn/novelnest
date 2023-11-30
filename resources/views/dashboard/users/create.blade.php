<!-- resources/views/dashboard/users/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buat Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="password"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Kata Sandi</label>
                            <input type="password" name="password" id="password"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Konfirmasi Kata
                                Sandi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
                                {{ __('Buat Pengguna') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>