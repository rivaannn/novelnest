<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('List Data Buku') }}
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
    <div class="relative py-12"> <!-- Tambahkan class relative pada div utama -->
        <div class="flex items-center justify-center p-2.5">
            <!-- Tombol Tambah Buku -->
            <a href="{{ url('books/create') }}"
                class="inline-block px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
            <!-- Search Form -->
            <form action="{{ route('books.search') }}" class="max-w-[480px] w-full px-4" method="get">
                <div class="relative flex items-center">
                    <input type="text" id="searchInput" name="q"
                        class="w-full h-12 p-4 border-none rounded-full" placeholder="Search" autocomplete="off">
                    <div id="searchResults"
                        class="absolute z-10 hidden w-full mt-1 bg-white border border-t-0 rounded-b-lg shadow">
                        <!-- Hasil live search akan ditampilkan di sini -->
                    </div>
                    <button type="submit" class="ml-2">
                        <svg class="w-5 h-5 fill-current text-sky-600" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve">
                            <path
                                d="M55.146,51.401l-9.799-9.799c3.396-4.711,5.419-10.499,5.419-16.802C50.766,11.431,39.335,0,25.383,0   C11.431,0,0,11.431,0,25.383s11.431,25.383,25.383,25.383c6.303,0,12.091-2.023,16.802-5.419l9.799,9.799   c0.781,0.781,2.047,0.781,2.828,0l2.828-2.828C55.927,53.448,55.927,52.182,55.146,51.401z M25.383,44.966   c-9.374,0-16.966-7.592-16.966-16.966c0-9.374,7.592-16.966,16.966-16.966c9.374,0,16.966,7.592,16.966,16.966   C42.348,37.374,34.756,44.966,25.383,44.966z" />
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Tombol Export PDF -->
            <a href="{{ url('books/book-report-pdf') }}"
                class="inline-block px-4 py-2 text-white bg-red-700 rounded-md hover:bg-red-800 focus:outline-none focus:shadow-outline-red active:bg-red-800"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" data-slot="icon" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
            </a>
        </div>
    </div>


    <div class="flex items-center justify-center max-w-full mx-auto sm:px-6 lg:px-8">
        @if ($books->isEmpty())
            <p class="text-xl text-center text-red-500 border-2 outline-dashed">
                {{ __('Tidak Ada buku yang ditemukan.') }}
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
                            {{ __('Title') }}
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                            {{ __('Deskripsi') }}
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                            {{ __('Penulis') }}
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
                            {{ __('Harga') }}
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-right dark:text-white">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody id="booksTable"
                    class="bg-white border border-gray-700 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700 dark:text-gray-200">
                    @foreach ($books as $key => $book)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ mb_strimwidth($book->description, 0, 20, '...') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $book->writter->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ 'RP.' . number_format($book->price, 2, ',', '.') }}
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
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="inline-block px-4 py-2 ml-2 text-sm font-medium text-center text-red-600 bg-red-100 rounded-md hover:bg-red-200 focus:outline-none focus:shadow-outline-red active:bg-red-300"
                                        type="button">
                                        {{ __('Delete') }}
                                    </button>

                                    <div id="popup-modal" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-lg max-h-full p-2">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 text-center md:p-5">
                                                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Apakah kamu yakin ingin menghapus buku ini ?</h3>
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                        IYA
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">TIDAK
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="flex items-center justify-center mt-8">
        @if ($books instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{ $books->links() }}
        @endif
    </div>
    </div>
    @include('partials.footer')
</x-app-layout>
