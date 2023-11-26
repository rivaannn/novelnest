@extends('layouts.main')

@section('content')
    <header class="bg-gray-100 dark:bg-gray-900">
        <div class="container flex flex-col px-6 py-10 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
            <div class="w-full lg:w-1/2">
                <div class="lg:max-w-lg">
                    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">Novel</span>
                        Nest.</h1>
                    <p class="text-lg font-normal text-gray-600 lg:text-xl dark:text-gray-400"> Menemukan Petualangan dan
                        Kisah Penuh Makna di Setiap Halaman dengan Telusuri Dunia Penuh Imajinasi bareng Novelnest Tempat
                        di Mana Cerita Tak Terbatas.</p>
                </div>
            </div>

            <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
                <img class="object-cover w-full h-full max-w-2xl rounded-md" src="https://source.unsplash.com/1200x800/?book"
                    alt="glasses photo">
            </div>
        </div>
    </header>

    {{-- Kategori Buku --}}
    <div class="container mx-auto mt-8">
        <h1 class="mt-4 mb-8 text-4xl font-bold text-center">Kategori Buku</h1>

        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-6">
            <!-- Kategori 1 -->
            <div class="flex flex-col items-center">
                <a href="#">
                    <img class="object-cover" src="https://source.unsplash.com/120x120/?book" alt="Kategori 1 Logo">
                    <p class="text-xl text-center">Programming</p>
                </a>
            </div>
            <!-- Kategori 2 -->
            <div class="flex flex-col items-center">
                <a href="#">
                    <img class="object-cover" src="https://source.unsplash.com/120x120/?book" alt="Kategori 1 Logo">
                    <p class="text-xl text-center">Programming</p>
                </a>
            </div>
            <!-- Kategori 3 -->
            <div class="flex flex-col items-center">
                <a href="#">
                    <img class="object-cover" src="https://source.unsplash.com/120x120/?book" alt="Kategori 1 Logo">
                    <p class="text-xl text-center">Programming</p>
                </a>
            </div>
            <!-- Kategori 4 -->
            <div class="flex flex-col items-center">
                <a href="#">
                    <img class="object-cover" src="https://source.unsplash.com/120x120/?book" alt="Kategori 1 Logo">
                    <p class="text-xl text-center">Programming</p>
                </a>
            </div>
            <!-- Kategori 5 -->
            <div class="flex flex-col items-center">
                <a href="#">
                    <img class="object-cover" src="https://source.unsplash.com/120x120/?book" alt="Kategori 1 Logo">
                    <p class="text-xl text-center">Programming</p>
                </a>
            </div>
            <!-- Kategori 6 -->
            <div class="flex flex-col items-center">
                <a href="#">
                    <img class="object-cover" src="https://source.unsplash.com/120x120/?book" alt="Kategori 1 Logo">
                    <p class="text-xl text-center">Programming</p>
                </a>
            </div>
        </div>
    </div>



    {{-- Rekomendasi Buku --}}
    <div class="container py-8 mx-auto">
        <h1 class="mt-8 mb-8 text-4xl font-bold">Rekomendasi Buku Novelnest</h1>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <a href="#" class="overflow-hidden transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                <img class="object-cover object-center w-full h-48" src="https://source.unsplash.com/800x1200/?book"
                    alt="Book Image">
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold">MELANGKAH</h2>
                    <p class="mb-2 text-gray-700">Penulis: JS KHAIREN</p>
                    <p class="mb-2 text-gray-700">Harga: Rp 74.400</p>
                    <!-- Badges Kategori -->
                    <span
                        class="inline-block px-2 py-1 text-xs font-semibold tracking-wide text-white bg-blue-500 rounded">Agama</span>
                </div>
            </a>

            <a href="#" class="overflow-hidden transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                <img class="object-cover object-center w-full h-48" src="https://source.unsplash.com/800x1200/?book"
                    alt="Book Image">
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold">MELANGKAH</h2>
                    <p class="mb-2 text-gray-700">Penulis: JS KHAIREN</p>
                    <p class="mb-2 text-gray-700">Harga: Rp 74.400</p>
                    <!-- Badges Kategori -->
                    <span
                        class="inline-block px-2 py-1 text-xs font-semibold tracking-wide text-white bg-blue-500 rounded">Pendidikan</span>
                </div>
            </a>

            <a href="#" class="overflow-hidden transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                <img class="object-cover object-center w-full h-48" src="https://source.unsplash.com/800x1200/?book"
                    alt="Book Image">
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold">MELANGKAH</h2>
                    <p class="mb-2 text-gray-700">Penulis: JS KHAIREN</p>
                    <p class="mb-2 text-gray-700">Harga: Rp 74.400</p>
                    <!-- Badges Kategori -->
                    <span
                        class="inline-block px-2 py-1 text-xs font-semibold tracking-wide text-white bg-blue-500 rounded">Programming</span>
                </div>
            </a>

            <a href="#" class="overflow-hidden transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                <img class="object-cover object-center w-full h-48" src="https://source.unsplash.com/800x1200/?book"
                    alt="Book Image">
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold">MELANGKAH</h2>
                    <p class="mb-2 text-gray-700">Penulis: JS KHAIREN</p>
                    <p class="mb-2 text-gray-700">Harga: Rp 74.400</p>
                    <!-- Badges Kategori -->
                    <span
                        class="inline-block px-2 py-1 text-xs font-semibold tracking-wide text-white bg-blue-500 rounded">Anak
                        - Anak</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Tombol "Lihat Semua Buku" -->
    <div class="container mx-auto mt-4 text-end">
        <a href="#"
            class="px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-md hover:bg-blue-600">Lihat
            Semua Buku</a>
    </div>

    {{-- Blog NovelNest --}}
    <div class="py-16 mt-8 overflow-hidden bg-gray-100">
        <div class="container px-6 m-auto space-y-8 text-gray-500 md:px-12">
            <div>
                <h2 class="mt-4 text-2xl font-bold text-gray-900 md:text-4xl">Blog Novelnest</h2>
            </div>
            <div
                class="grid mt-16 overflow-hidden border divide-x divide-y rounded-xl sm:grid-cols-2 lg:divide-y-0 lg:grid-cols-3 xl:grid-cols-4">
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://source.unsplash.com/1600x800/?book" class="shadow-md"
                            alt="burger illustration">
                        <div class="space-y-2">
                            <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-blue-600">First
                                feature</h5>
                            <p class="text-sm text-gray-600">Neque Dolor, fugiat non cum doloribus aperiam voluptates
                                nostrum.</p>
                        </div>
                        <a href="#" class="flex items-center justify-between group-hover:text-blue-600">
                            <span class="text-sm">Read more</span>
                            <span
                                class="text-2xl transition duration-300 -translate-x-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                </div>
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://source.unsplash.com/1600x800/?book" class="shadow-md"
                            alt="burger illustration">

                        <div class="space-y-2">
                            <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-blue-600">Second
                                feature</h5>
                            <p class="text-sm text-gray-600">Neque Dolor, fugiat non cum doloribus aperiam voluptates
                                nostrum.</p>
                        </div>
                        <a href="#" class="flex items-center justify-between group-hover:text-blue-600">
                            <span class="text-sm">Read more</span>
                            <span
                                class="text-2xl transition duration-300 -translate-x-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                </div>
                <div class="relative group bg-white transition hover:z-[1] hover:shadow-2xl">
                    <div class="relative p-8 space-y-8">
                        <img src="https://source.unsplash.com/1600x800/?book" class="shadow-md"
                            alt="burger illustration">

                        <div class="space-y-2">
                            <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-blue-600">Third
                                feature</h5>
                            <p class="text-sm text-gray-600">Neque Dolor, fugiat non cum doloribus aperiam voluptates
                                nostrum.</p>
                        </div>
                        <a href="#" class="flex items-center justify-between group-hover:text-blue-600">
                            <span class="text-sm">Read more</span>
                            <span
                                class="text-2xl transition duration-300 -translate-x-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-0">&RightArrow;</span>
                        </a>
                    </div>
                </div>
                <div class="relative group bg-gray-100 transition hover:z-[1] hover:shadow-2xl lg:hidden xl:block">
                    <div
                        class="flex items-center justify-center p-8 mt-20 space-y-8 transition duration-300 border-dashed rounded-lg group-hover:bg-white group-hover:border group-hover:scale-90">
                        <a href="#" class=" group-hover:text-blue-600">
                            <img src="https://source.unsplash.com/2000x800/?book" class="bg-cover shadow-md"
                                alt="burger illustration">

                            <div class="flex items-center justify-center mx-auto mt-4">
                                <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-blue-600">More
                                    Blog Novelnest</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
