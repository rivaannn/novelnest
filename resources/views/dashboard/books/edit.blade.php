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

                        <div class="mt-4">
                            <label for="title" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Title') }}
                            </label>
                            <input type="text" name="title" id="title" value="{{ $book->title }}"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-indigo-500 dark:focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-500 focus:ring-opacity-50"
                                autofocus />
                            @error('title')
                                <span class="text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Description') }}
                            </label>
                            <textarea name="description" id="description" rows="4"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-500 focus:ring-opacity-50">{{ $book->description }}</textarea>
                            @error('description')
                                <span class="text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="price" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Price') }}
                            </label>
                            <input type="text" name="price" id="price" value="{{ $book->price }}"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-500 focus:ring-opacity-50" />
                            @error('price')
                                <span class="text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="book_number" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Book Number') }}
                            </label>
                            <input type="text" name="book_number" id="book_number" value="{{ $book->book_number }}"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-500 focus:ring-opacity-50" />
                            @error('book_number')
                                <span class="text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                            {{-- writer --}}
                            <div class="mt-4">
                                <label for="writer" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Writer') }}
                                </label>
                                <input type="text" name="writer" id="writer" value="{{ $book->writer }}"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-500 focus:ring-opacity-50" />
                                @error('writer')
                                    <span class="text-sm text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="publisher" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Publisher') }}
                                </label>
                                <input type="text" name="publisher" id="publisher"
                                    value="{{ $book->publisher->nama }}"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-500 focus:ring-opacity-50" />
                                @error('publisher')
                                    <span class="text-sm text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="mt-4">
                                <label for="category" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Category') }}
                                </label>
                                <input type="text" name="category" id="category"
                                    value="{{ $book->category->name }}"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-500 focus:ring-opacity-50" />
                                @error('category')
                                    <span class="text-sm text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('books.index') }}"
                                    class="inline-block px-4 py-2 mr-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit"
                                    class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                    {{ __('Edit Buku') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</x-app-layout>
