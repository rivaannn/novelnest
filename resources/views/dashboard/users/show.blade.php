<!-- resources/views/dashboard/users/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-2xl font-semibold">{{ $user->name }}</h3>

                    <p class="text-lg font-medium">{{ __('Email') }}: {{ $user->email }}</p>
                    <!-- Add more details as needed -->

                    <div class="mt-4">
                        <a href="{{ route('users.index') }}" class="text-indigo-600 hover:text-indigo-900">Back to
                            Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
