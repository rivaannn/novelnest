<!-- resources/views/dashboard/users/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buat Publisher Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 mb-96">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('publishers.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="code"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Kode
                                Publishers</label>
                            <input type="text" name="code" id="code"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('publishers.index') }}"
                                class="inline-block px-4 py-2 text-gray-200 bg-gray-500 rounded-md me-2 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Buat Publishers') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</x-app-layout>
