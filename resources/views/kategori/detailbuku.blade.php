@extends('layouts.main')

@section('content')
    <section class="overflow-hidden text-gray-700 bg-white body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap mx-auto lg:w-4/5">
                <img alt="ecommerce" class="object-cover object-center w-full border border-gray-200 rounded lg:w-1/2"
                    src="https://www.whitmorerarebooks.com/pictures/medium/2465.jpg">
                <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
                    <h2 class="text-sm tracking-widest text-gray-500 title-font">{{ __('Nama Buku : ') }}</h2>
                    <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">{{ $books->title }}</h1>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Deskripsi Buku : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->description }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Buku Nomber : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->books_number }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Penulis : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->writter_id }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Penerbit : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->publisher_id }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Kategori : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->category_id }}</p>
                    <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
                    </div>
                    <div class="flex">
                        <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font me-2">
                            {{ __('Harga Buku : ') }}
                        </h2>
                        <span class="text-2xl font-medium text-gray-900 title-font">Rp.
                            {{ number_format($books->price, 0, ',', '.') }}</span>
                        <a href="{{ url('/kategori') }}" class="ms-auto">
                            <button
                                class="flex items-end px-6 py-2 ml-auto text-white bg-gray-500 border-0 rounded-full focus:outline-none hover:bg-gray-600">Kembali
                                ke buku
                            </button>
                        </a>
                        <button
                            class="flex items-end px-6 py-2 text-white bg-blue-500 border-0 rounded-full ms-2 focus:outline-none hover:bg-blue-600">Beli
                            Buku </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
