<!-- resources/views/dashboard/users/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buat Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-slate-900 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ __('Title') }}
                            </label>
                            <input type="text" name="title" id="title" placeholder="Title"
                                class="w-full px-3 py-2 text-gray-700 border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ __('Description') }}
                            </label>
                            <textarea name="description" id="description" rows="3" placeholder="Description"
                                class="w-full px-3 py-2 text-gray-700 border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:outline-none"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ __('Price') }}
                            </label>
                            <input type="text" name="price" id="price" placeholder="Price"
                                class="w-full px-3 py-2 text-gray-700 border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:outline-none">
                        </div>
                        <div class="mb-4">
                            <label for="writter_id"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ __('Writer') }}
                            </label>
                            <select name="writter_id" id="writter_id"
                                class="w-full px-3 py-2 text-gray-700 border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:outline-none">
                                @foreach ($writers as $writer)
                                    <option value={{ $writer->id }}>{{ $writer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="publisher_id"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ __('Publisher') }}
                            </label>
                            <select name="publisher_id" id="publisher_id"
                                class="w-full px-3 py-2 text-gray-700 border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:outline-none">
                                @foreach ($publishers as $publisher)
                                    <option value={{ $publisher->id }}>{{ $publisher->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="category_id"
                                class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ __('Category') }}
                            </label>
                            <select name="category_id" id="category_id"
                                class="w-full px-3 py-2 text-gray-700 border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:outline-none">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('books.index') }}"
                                class="inline-block px-4 py-2 text-gray-200 bg-gray-500 rounded-md me-2 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Buat Buku Baru') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</x-app-layout>
