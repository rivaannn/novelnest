<!-- resources/views/dashboard/users/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buku Details') }}
        </h2>
    </x-slot>

    <!-- component -->
    <section class="text-gray-700 body-font overflow-hidden bg-white">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
                    src="https://www.whitmorerarebooks.com/pictures/medium/2465.jpg">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ __('Nama Buku : ') }}</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $book->title }}</h1>
                    <h2 class="text-sm title-font text-gray-500 tracking-widest mt-2">{{ __('Deskripsi Buku : ') }}</h2>
                    <p class="leading-relaxed">{{ $book->description }}</p>
                    <h2 class="text-sm title-font text-gray-500 tracking-widest mt-2">{{ __('Buku Nomber : ') }}</h2>
                    <p class="leading-relaxed">{{ $book->book_number }}</p>
                    <h2 class="text-sm title-font text-gray-500 tracking-widest mt-2">{{ __('Penulis : ') }}</h2>
                    <p class="leading-relaxed">{{ $book->writter_id }}</p>
                    <h2 class="text-sm title-font text-gray-500 tracking-widest mt-2">{{ __('Penerbit : ') }}</h2>
                    <p class="leading-relaxed">{{ $book->publisher_id }}</p>
                    <h2 class="text-sm title-font text-gray-500 tracking-widest mt-2">{{ __('Kategori : ') }}</h2>
                    <p class="leading-relaxed">{{ $book->category_id }}</p>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                    </div>
                    <div class="flex">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest mt-2 me-2">
                            {{ __('Harga Buku : ') }}
                        </h2>
                        <span class="title-font font-medium text-2xl text-gray-900">Rp.
                            {{ number_format($book->price, 0, ',', '.') }}</span>
                        <a href="{{ route('books.index') }}" class="ms-auto">
                            <button
                                class="flex ml-auto items-end text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded-full">Kembali
                                ke buku
                            </button>
                        </a>
                        <button
                            class="flex items-end ms-2 text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded-full">Beli
                            Buku </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    @include('partials.footer')
</x-app-layout>
