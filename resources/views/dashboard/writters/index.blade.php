<!-- resources/views/dashboard/users/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('List Data Penulis') }}
        </h2>
    </x-slot>

    <!-- Menampilkan pesan notifikasi -->
    @if (Session::has('success'))
        <div
            class="flex items-center justify-center max-w-4xl p-2 mx-auto mt-8 mb-4 text-white bg-green-500 rounded-full ms-auto">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- Jika Gagal  --}}
    @if (Session::has('error'))
        <div
            class="flex items-center justify-center max-w-4xl p-2 mx-auto mt-8 mb-4 text-white bg-red-500 rounded-full ms-auto">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="py-12">
        <div class="flex items-center justify-center mb-6 me-96">
            <a href="{{ route('writters.create') }}"
                class="inline-block px-4 py-2 text-white bg-green-600 rounded-md ms-96 hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

            </a>

            <!-- Search Form -->
            <form action="" class="max-w-[480px] w-full px-4" method="get">
                <div class="relative flex items-center">
                    <input type="text" name="searchWritters" class="w-full h-12 p-4 border rounded-full shadow"
                        placeholder="Search">
                    <button type="submit" class="ml-2">
                        <svg class="w-5 h-5 fill-current text-sky-600" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                            </path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="flex items-center justify-center max-w-full mx-auto sm:px-6 lg:px-8">
            @if ($writters->isEmpty())
                <p class="text-xl text-center text-red-500 border-2 outline-dashed">
                    {{ __('Tidak Ada Penulis yang ditemukan.') }}
                </p>
            @else
                <table class="max-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('No') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('Nama') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                                {{ __('Alamat') }}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right dark:text-white">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody
                        class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700 dark:text-gray-200 border border-gray-800">
                        @foreach ($writters as $key => $writter)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $writter->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ mb_strimwidth($writter->address, 0, 20, '...') }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <a href="{{ route('writters.show', $writter->id) }}"
                                        class="inline-block px-4 py-2 ml-2 text-yellow-600 bg-yellow-100 rounded-md hover:bg-yellow-300 focus:outline-none focus:shadow-outline-yellow active:bg-yellow-300">
                                        {{ __('View') }}
                                    </a>
                                    <a href="{{ route('writters.edit', $writter->id) }}"
                                        class="inline-block px-4 py-2 ml-2 text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:shadow-outline-blue active:bg-blue-300">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('writters.destroy', $writter->id) }}" method="POST"
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
        <div class="flex items-center justify-center mt-8">
            @if ($writters instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $writters->links() }}
            @endif
        </div>
    </div>
    </div>
    </div>
    @include('partials.footer')
</x-app-layout>
