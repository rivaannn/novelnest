@extends('layouts.main')

@section('content')
    <div class="flex flex-wrap items-center justify-center py-4 mt-12 md:py-8">
        <button type="button"
            class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800">All
            categories</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Programming</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Novel</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Sejarah</button>
        <button type="button"
            class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Pendidikan</button>
    </div>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
            class="relative px-6 py-20 overflow-hidden text-center bg-white isolate sm:px-16 sm:shadow-sm dark:bg-transparent">
            <p class="max-w-2xl mx-auto text-3xl font-bold tracking-tight text-gray-900 dark:text-gray-200 sm:text-4xl">
                Cari postingan menarik hanya di NovelNest ...
            </p>
            <form action="/search">
                <label
                    class="relative flex flex-col items-center justify-center max-w-2xl gap-2 px-2 py-2 mx-auto mt-8 bg-white shadow-2xl dark:bg-gray-800 min-w-sm md:flex-row rounded-2xl focus-within:border-gray-300"
                    for="search-bar">

                    <input id="search-bar" placeholder="cari postingan disini" name="q"
                        class="flex-1 w-full px-6 py-2 bg-white rounded-md outline-none" required="">
                    <button type="submit"
                        class="relative w-full px-6 py-3 overflow-hidden text-white transition-all duration-100 bg-black border border-black md:w-auto fill-white active:scale-95 will-change-transform rounded-xl">
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



    <div class="grid grid-cols-1 gap-4 mt-20 ml-20 mr-20 md:grid-cols-1 lg:grid-cols-4">
        @foreach ($blogs as $blog)
            @if ($loop->iteration > 8)
            @break
        @endif
        <div class="p-2 bg-white border rounded-lg shadow-md dark:bg-gray-800 dark:border-white hover:shadow-xl ">
            <a href="#">
                <img class="rounded-t-lg" src="https://source.unsplash.com/1200x800/?book" alt="" />
            </a>
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $blog->title }}
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $blog->slug }}</p>
                <a href="/blog/detailblog/{{ $blog->id }}"
                    class="flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
</div>


<div class="flex items-center justify-center mt-12 mb-12 bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    {{ $blogs->links() }}
</div>
@endsection
