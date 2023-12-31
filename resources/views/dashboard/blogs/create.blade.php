<!-- resources/views/dashboard/users/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buat Blog Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('blogs.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Judul</label>
                            <input type="text" name="title" id="title"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                        </div>

                        <div class="mb-4">
                            <label for="slug"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Slug</label>
                            <input type="text" name="slug" id="slug"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                        </div>

                        <div class="mb-4">
                            <label for="author"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Author</label>
                            <input type="text" name="author" id="author"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="category"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Kategori</label>
                            <input type="text" name="category" id="category"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                        </div>

                        <div class="mb-4">
                            <label for="body"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Isi</label>
                            <textarea name="body" id="body" rows="4"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="status"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Status</label>
                            <select name="status" id="status"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('blogs.index') }}"
                                class="inline-block px-4 py-2 mr-2 text-white bg-gray-500 rounded-md dark:bg-gray-700 hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-800">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md dark:bg-blue-800 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Tambah Blog') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</x-app-layout>
