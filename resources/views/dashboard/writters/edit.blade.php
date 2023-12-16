<!-- resources/views/dashboard/users/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Penulis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('writters.update', $writter->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama</label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $writter->name) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="address"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Alamat</label>
                            <input type="text" name="address" id="address"
                                value="{{ old('address', $writter->address) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('users.index') }}"
                                class="inline-block px-4 py-2 mr-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Update Penulis') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</x-app-layout>
