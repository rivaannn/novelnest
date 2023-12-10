<!-- resources/views/dashboard/users/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="title"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="slug"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Slug</label>
                            <input type="slug" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="category"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Category</label>
                            <input type="category" name="category" id="category"
                                value="{{ old('category', $blog->category) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                        </div>

                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Image</label>
                            <input type="image" name="image" id="image" value="{{ old('image', $blog->image) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                            <img src="{{ asset('public/' . $blog->image) }}" alt="blog" class="w-25 h-25">
                        </div>

                        <div class="mb-4">
                            <label for="body"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Body</label>
                            <textarea name="body" id="body" rows="4"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">{{ old('body', $blog->body) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="status"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Status</label>
                            <select name="status" id="status"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-indigo-500">
                                <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>
                                    Published</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('blogs.index') }}"
                                class="inline-block px-4 py-2 mr-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Update Blog') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</x-app-layout>
