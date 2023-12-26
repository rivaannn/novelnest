@extends('layouts.main')

@section('content')
    <!-- Filter Section -->
    <div class="container flex flex-wrap py-12 mx-auto mt-8 dark:bg-gray-800">
        <div class="w-full pr-4 mb-8 md:w-1/4 md:mb-0">
            <!-- Filter Options -->
            <div class="mb-4 ">
                <h2 class="mb-2 text-2xl font-semibold dark:text-white">Filter Kategori</h2>
                <form class="grid grid-flow-row-dense" action="{{ route('kategori.filter') }}" method="get">
                    @csrf
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                        Buku</label>
                    <select id="kategori" name="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    {{-- Penulis --}}
                    <div class="mt-4">
                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis
                            Buku</label>
                        <select id="penulis" name="writter"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Semua Penulis</option>
                            @foreach ($writters as $writter)
                                <option value="{{ $writter->id }}">{{ $writter->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-2 mb-4">
                        <!-- Harga Minimum -->
                        <label for="harga_min"
                            class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Minimum
                            Buku</label>
                        <input wire:model="harga_min" type="text" id="harga_min" name="harga_min"
                            placeholder="Masukkan Harga Minimum (Rp.)"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            autocomplete="off" type-currency="IDR">
                        <!-- Harga Maksimum -->
                        <label for="harga_max"
                            class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Maksimum
                            Buku</label>
                        <input wire:model="harga_max" type="text" id="harga_max" name="harga_max"
                            placeholder="Masukkan Harga Maksimum (Rp.)"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            autocomplete="off" type-currency="IDR">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="text-blue-700 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 mb-4">Terapkan
                        Filter</button>
                </form>

                <!-- Reset Filter Button -->
                <form class="grid grid-flow-row-dense" action="{{ route('kategori.index') }}" method="get">
                    @csrf
                    <button type="submit"
                        class="text-blue-700 hover:text-white border border-blue-600 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Reset
                        Filter</button>
                </form>
            </div>
        </div>

        <!-- Product Section -->
        <div class="w-full md:w-3/4">
            <nav class="flex items-center justify-center p-4">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div
                        class="relative px-6 py-8 overflow-hidden text-center bg-white isolate sm:px-16 sm:shadow-sm dark:bg-transparent">
                        <p
                            class="max-w-2xl mx-auto text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">
                            Cari buku menarik hanya di NovelNest ...
                        </p>

                        <form action="{{ route('kategori.search') }}" method="get">
                            <label for="search-bar"
                                class="relative flex flex-col items-center justify-center max-w-2xl gap-2 px-2 py-2 mx-auto mt-8 bg-white shadow-2xl min-w-sm md:flex-row rounded-2xl focus-within:border-gray-300 dark:bg-gray-800">
                                <input id="search-bar" placeholder="cari buku disini" name="search"
                                    class="flex-1 w-full px-6 py-2 bg-white rounded-md outline-none" autocomplete="off">
                                <button type="submit"
                                    class="relative w-full px-6 py-3 overflow-hidden text-white transition-all duration-100 bg-blue-700 hover:bg-blue-600 border border-black md:w-auto fill-white active:scale-95 will-change-transform rounded-xl">
                                    <div class="flex items-center transition-all opacity-1">
                                        <span class="mx-auto text-sm font-semibold truncate whitespace-nowrap">
                                            Search
                                        </span>
                                    </div>
                                </button>
                            </label>
                        </form>

                    </div>
                </div>
            </nav>

            <!-- Live Search Results -->
            <div class="grid grid-cols-4 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3" id="live-search-results">
            </div>

            <!-- Product List (Filtered) -->
            <div class="grid grid-cols-4 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3" id="no-search">
                @foreach ($books as $book)
                    @if ($loop->iteration > 9)
                    @break
                @endif
                <a href="/kategori/detailbuku/{{ $book->id }}"
                    class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg dark:bg-gray-700">
                    <img class="object-cover object-center w-full h-48 mb-2"
                        src="https://source.unsplash.com/1200x800/?book/{{ $book->id }}" alt="Book Image">
                    <h3 class="text-lg font-semibold dark:text-white">{{ $book->title }}</h3>
                    <p class="text-gray-700 dark:text-white">Penulis: {{ $book->writter->name }}</p>
                    <p class="pt-2 text-lg text-blue-700">{{ 'RP.' . number_format($book->price) }}
                        <span
                            class="inline-block float-right px-2 py-1 text-xs tracking-wide text-white bg-blue-500 rounded">
                            {{ $book->category->name }}
                        </span>
                    </p>
                </a>
            @endforeach
        </div>

        {{-- Jika tidak ada buku yang sesuai dengan filter --}}
        @if ($books->isEmpty())
            <div class="flex flex-col items-center justify-center mt-8">
                <h2 class="mb-2 text-2xl font-semibold dark:text-white">Buku tidak ditemukan</h2>
                <p class="text-gray-700 dark:text-gray-300">Buku yang anda cari tidak ditemukan, silahkan cari buku
                    lainnya.</p>
            </div>
        @endif

        {{-- Pagination --}}
        <div class="flex items-center justify-center mt-8 mb-36">
            @if ($books instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $books->links() }}
            @endif
        </div>
    </div>
</div>

{{-- Script Untuk Live Search --}}
<script>
    const searchForm = document.querySelector('form[action="{{ route('kategori.search') }}"]');
    const liveSearchResultsContainer = document.getElementById('live-search-results');
    const noSearch = document.getElementById('no-search');

    searchForm.addEventListener('input', function(event) {
        event.preventDefault();
        liveSearch();
    });

    function liveSearch() {
        const searchFormData = new FormData(searchForm);
        const searchInputValue = searchFormData.get('search');

        if (searchInputValue.length > 0) {
            fetch(`/kategori/search?search=${searchInputValue}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(data => {
                    displayLiveSearchResults(JSON.parse(data));
                })
                .catch(error => console.log(error));
            noSearch.classList.add('hidden');
        } else {
            liveSearchResultsContainer.innerHTML = '';
            noSearch.classList.remove('hidden');
        }
    }

    function displayLiveSearchResults(results) {
        liveSearchResultsContainer.classList.remove('hidden');

        if (!Array.isArray(results.data) || results.data.length === 0) {
            liveSearchResultsContainer.innerHTML = `
            <div class="flex flex-col items-center justify-center mt-8">
    <div class="p-6 text-center bg-red-600 rounded-lg">
        <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path>
        </svg>
        <h2 class="mt-4 mb-2 text-2xl font-semibold text-white dark:text-white">Buku tidak ditemukan</h2>
        <p class="text-gray-300 dark:text-gray-300">Buku yang anda cari tidak ditemukan, silahkan cari buku lainnya.</p>
    </div>
</div>
    `;
            return;
        }

        const categories = results.data.map(book => book.category ? book.category.name : 'Tidak Diketahui');
        const writters = results.data.map(book => book.writter ? book.writter.name : 'Tidak Diketahui');

        liveSearchResultsContainer.innerHTML = results.data.map((result, index) => {
            return `
        <a href="/kategori/detailbuku/${result.id}" class="block p-4 bg-white rounded-md shadow-md hover:shadow-lg dark:bg-gray-700">
            <img class="object-cover object-center w-full h-48 mb-2" src="https://source.unsplash.com/1200x800/?book/${result.id}" alt="Book Image">
            <h3 class="text-lg font-semibold dark:text-white">${result.title}</h3>
            <p class="text-gray-700 dark:text-white">Penulis: ${writters[index]}</p>
            <p class="pt-2 text-lg text-blue-700">RP.${result.price}
                <span class="inline-block float-right px-2 py-1 text-xs tracking-wide text-white bg-blue-500 rounded">
                    ${categories[index]}
                </span>
            </p>
        </a>
    `;
        }).join('');
    }
</script>

{{-- Script untuk Format Rupiah --}}
<script>
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
        element.addEventListener('keyup', function(e) {
            let cursorPostion = this.selectionStart;
            let value = parseInt(this.value.replace(/[^,\d]/g, ''));
            let originalLenght = this.value.length;
            if (isNaN(value)) {
                this.value = "";
            } else {
                this.value = value.toLocaleString('id-ID', {
                    currency: 'IDR',
                    style: 'currency',
                    minimumFractionDigits: 0
                });
                cursorPostion = this.value.length - originalLenght + cursorPostion;
                this.setSelectionRange(cursorPostion, cursorPostion);
            }
        })
    });
</script>
@endsection
