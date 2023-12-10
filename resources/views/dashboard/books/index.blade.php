<!-- resources/views/dashboard/users/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('List Data Buku') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="flex items-end justify-end mb-6 me-96">
            <a href="{{ route('books.create') }}"
                class="inline-block px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                {{ __('Tambah Buku') }}
            </a>
        </div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($books->isEmpty())
                <p class="text-xl text-center text-red-500 border-2 outline-dashed">
                    {{ __('Tidak Ada buku yang ditemukan.') }}
                </p>
            @else
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('No') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('Title') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-right">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                        @foreach ($books as $key => $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $book->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ mb_strimwidth($book->description, 0, 50, '...') }}
                                    {{ $book->title }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a href="{{ route('books.show', $book->id) }}"
                                        class="inline-block px-4 py-2 ml-2 text-yellow-600 bg-yellow-100 rounded-md hover:bg-yellow-300 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-300">
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('books.edit', $book->id) }}"
                                        class="inline-block px-4 py-2 ml-2 text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:shadow-outline-blue active:bg-blue-300">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-4 py-2 ml-2 text-red-600 bg-red-100 rounded-md hover:bg-red-200 focus:outline-none focus:shadow-outline-red active:bg-red-300">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
