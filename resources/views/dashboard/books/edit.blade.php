<!-- resources/views/dashboard/users/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $book->name) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $book->email) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('books.index') }}"
                                class="inline-block px-4 py-2 mr-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
                                {{ __('Update Tambah') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
