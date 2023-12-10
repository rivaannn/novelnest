<!-- resources/views/dashboard/users/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buku Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-400">
                    <div class="mb-4">
                        <div class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            {{ $books->title }}
                        </div>
                    </div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $books->description }}
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('books.index') }}" class="text-indigo-600 hover:text-indigo-900">Kembali
                        ke
                        Buku</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
