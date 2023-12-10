<!-- resources/views/dashboard/users/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detail Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-2xl font-semibold">{{ $blogs->title }}</h3>
                    <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ $blogs->slug }}
                    </p>
                    <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ $blogs->body }}
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('blogs.index') }}" class="text-indigo-600 hover:text-indigo-900">Kembali ke
                            Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
