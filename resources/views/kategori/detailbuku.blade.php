@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="flex items-center px-4 py-3 mb-4 text-sm text-white bg-green-500 rounded-lg shadow-md" role="alert">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @elseif (session('error'))
        <div class="flex items-center px-4 py-3 mb-4 text-sm text-white bg-red-500 rounded-lg shadow-md" role="alert">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    @endif



    <button
        class="flex items-start px-3 py-2 mb-4 ml-56 text-gray-600 bg-gray-300 border-0 rounded-full mt-28 focus:outline-none hover:bg-gray-200 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-700"><svg
            class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 16 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 5H1m0 0 4 4M1 5l4-4" />
        </svg> <a href="{{ url('/kategori') }}" class="ms-auto"> &nbsp;Kembali
    </button>
    </a>
    <section class="overflow-hidden text-gray-700 bg-white body-font dark:bg-gray-800 dark:text-white">
        <div class="container px-5 py-4 mx-auto mb-48">
            <div class="flex flex-wrap mx-auto lg:w-4/5">
                <img alt="ecommerce" class="object-cover object-center w-full border border-gray-200 rounded lg:w-1/2"
                    src="https://source.unsplash.com/1200x800/?book/{{ $books->id }}">
                <div class="w-full lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
                    <h2 class="text-sm tracking-widest text-gray-500 title-font">{{ __('Nama Buku : ') }}</h2>
                    <h1 class="mb-1 text-2xl font-medium text-gray-900 title-font dark:text-white">{{ $books->title }}</h1>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Deskripsi Buku : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->description }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Buku Number : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->book_number }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Penulis : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->writter->name }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Penerbit : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->publisher->nama }}</p>
                    <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font">{{ __('Kategori : ') }}</h2>
                    <p class="leading-relaxed">{{ $books->category->name }}</p>
                    <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
                    </div>
                    <div class="flex">
                        <h2 class="mt-2 text-sm tracking-widest text-gray-500 title-font me-2">
                            {{ __('Harga Buku : ') }}
                        </h2>
                        <span class="mt-1 text-xl font-medium text-blue-500 title-font">Rp.
                            {{ number_format($books->price, 0, ',', '.') }}</span>

                        {{-- Add Keranjang --}}
                        <form action="{{ route('addKeranjang') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $books->id }}">
                            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="price" value="{{ $books->price }}">
                            <button class="px-4 py-2 ">
                                <img class="ml-3 cursor-pointer w-7 h-7" src="{{ asset('img/keranjang.png') }}"
                                    alt="Icon Keranjang">
                            </button>
                        </form>

                        <button
                            class="px-6 py-2 text-white bg-blue-500 border-0 rounded-full ms-2 focus:outline-none hover:bg-blue-600">Beli
                            Buku
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
