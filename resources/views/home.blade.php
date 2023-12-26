@extends('layouts.main')

@section('content')
    <header class="bg-gray-100 dark:bg-gray-900">
        <div class="container flex flex-col px-6 py-10 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-lg">
                    <h1
                        class="mt-8 mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl sm:text-xl">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">Novel</span>
                        Nest.
                    </h1>
                    <p class="text-lg font-normal text-gray-600 lg:text-xl dark:text-gray-400"> Menemukan Petualangan dan
                        Kisah Penuh Makna di Setiap Halaman dengan Telusuri Dunia Penuh Imajinasi bareng Novelnest Tempat
                        di Mana Cerita Tak Terbatas.</p>
                </div>
            </div>

            <div class="flex items-center justify-center w-full h-96 lg:w-1/2">


                <div id="gallery" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://source.unsplash.com/1200x800/?book"
                                class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                            <img src="https://source.unsplash.com/1200x800/?study"
                                class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://source.unsplash.com/1200x800/?library"
                                class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="">
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>

                </div>
            </div>
    </header>

    {{-- Kategori Buku --}}
    <div class="container mx-auto mt-8 dark:bg-gray-800">
        <h1 class="mt-4 mb-8 text-4xl font-bold text-center dark:text-white">Kategori Buku</h1>
        <div class="grid grid-cols-4 gap-4 md:grid-cols-3 lg:grid-cols-6">
            @foreach ($categories as $category)
                <div class="flex flex-col items-center">
                    <a href="{{ route('kategori.filterByCategory', ['category' => $category->id]) }}"
                        class="w-full relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <p
                            class="w-full text-center relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            {{ $category->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>



    {{-- Rekomendasi Buku --}}
    <div class="container py-8 mx-auto dark:bg-gray-800">
        <h1 class="mt-8 mb-8 text-4xl font-bold dark:text-white">Rekomendasi Buku Novelnest</h1>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($latestBooks as $book)
                <a href="{{ route('kategori.detailbuku', $book->id) }}"
                    class="overflow-hidden transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <img class="object-cover object-center w-full h-48 dark:shadow-lg"
                        src="https://source.unsplash.com/800x1200/?book" alt="Book Image">
                    <div class="p-4">
                        <h2 class="mb-2 text-xl font-bold">{{ $book->title }}</h2>
                        <p class="mb-2 text-gray-700">Penulis: {{ $book->writter->name }} </p>
                        <p class="mb-2 text-lg text-blue-500">{{ 'RP.' . number_format($book->price, 2, ',', '.') }}
                        </p>
                        <!-- Badges Kategori -->
                        <span
                            class="inline-block px-2 py-1 text-xs font-semibold tracking-wide text-white bg-blue-500 rounded">{{ $book->category->name }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Tombol "Lihat Semua Buku" -->
    <div class="container mx-auto mt-4 text-end dark:bg-gray-800">
        <a href="{{ url('/kategori') }}"
            class="px-4 py-2 text-white transition bg-blue-500 rounded-full duration-600 hover:bg-blue-600">Lihat
            Semua Buku</a>
    </div>

    {{-- Blog NovelNest --}}
    <div class="py-16 mt-8 overflow-hidden bg-gray-100 dark:bg-gray-800">
        <div class="container px-6 m-auto space-y-8 text-gray-500 md:px-12">
            <div>
                <h2 class="mt-4 text-2xl font-bold text-gray-900 md:text-4xl dark:text-white">Blog Novelnest</h2>
            </div>

            <div
                class="grid mt-16 overflow-hidden border divide-x divide-y rounded-xl sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($blogs as $blog)
                    @if ($loop->iteration > 4)
                    @break
                @endif
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://source.unsplash.com/1600x800/?book" class="shadow-md"
                            alt="burger illustration">
                        <div class="space-y-2">
                            <h5
                                class="text-xl font-medium text-gray-800 transition group-hover:text-blue-600 dark:text-white-100">
                                {{ $blog->author }}</h5>
                            <p class="text-sm text-gray-600 ">{{ $blog->title }}</p>
                        </div>
                        <a href="/blog/detailblog/{{ $blog->id }}"
                            class="flex items-center justify-between group-hover:text-blue-600">
                            <span class="text-sm">Read more</span>
                            <span
                                class="text-2xl transition -translate-x-4 opacity-0 duration-600 group-hover:opacity-100 group-hover:translate-x-0">
                                &RightArrow;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Tombol "Lihat Semua Buku" -->
    <div class="container mx-auto mt-8 text-end dark:bg-gray-800">
        <a href="{{ url('/blog') }}"
            class="px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-full hover:bg-blue-600">Lihat
            Semua Blog</a>
    </div>

</div>
@endsection
