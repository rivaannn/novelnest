<nav class="fixed top-0 z-40 w-full shadow-md bg-gray-50 start-0 dark:bg-gradient-to-r from-black to-blue-800">
    <div class="flex flex-wrap items-center justify-between p-4 mx-auto max-w-screen-2xl">
        <a href="/" class="flex items-center ml-10 space-x-3 rtl:space-x-reverse">
            <img class="h-10" src="/img/logo.png" class="h-8 " alt="Novelnest">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">NovelNest</span>
        </a>
        <div class="flex mt-3 space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            {{-- Validasi ketika sudah ada yang login atau belum dan berikan pesan notifkasi --}}
            @auth
                <div x-data="{ open: false }" class="relative me-4">
                    <button @click="open = !open"
                        class="flex items-center space-x-2 text-sm font-medium text-gray-700 transition duration-150 ease-in-out hover:text-gray-900 dark:text-gray-200 dark:hover:text-white focus:outline-none">
                        @if (substr(Auth::user()->image, 0, 4) == 'http')
                            <img src="{{ Auth::user()->image }}" alt="Foto Profile" class="w-8 h-8 -mt-1 rounded-full">
                        @else
                            <img class="w-8 h-8 -mt-1 rounded-full me-2"
                                src=" {{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" />
                        @endif
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 space-y-2 text-gray-700 bg-white border border-gray-100 rounded-md shadow-md w-52 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                        @if (Auth::user()->is_admin == 1)
                            <a href="/dashboard"
                                class="block w-full px-4 py-2 transition duration-150 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
                            <a href="/dashboarduser"
                                class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out text-start dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800">Dashboard
                                User</a>
                        @elseif (Auth::user()->is_admin == 0)
                            <a href="/dashboarduser"
                                class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out text-start dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800">Dashboard
                                User</a>
                        @endif

                        @if (Auth::user()->is_admin == 1)
                            <a href="/profile"
                                class="block w-full px-4 py-2 transition duration-150 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                        @elseif (Auth::user()->is_admin == 0)
                            <a href="/profile-user"
                                class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out text-start dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800">Profile</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out text-start dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            <!-- Button Sebelum Login -->
            @guest
                <div class="flex pb-5">
                    <a href="/login"
                        class="relative inline-flex items-center justify-center px-5 py-2 overflow-hidden text-white bg-blue-600 rounded-lg group focus:ring-4 focus:ring-blue-300 me-2">
                        <span class="z-40 text-sm">Masuk</span>
                        <svg class="z-40 w-2 h-2 ml-1 -mr-0.5 transition-all duration-300 group-hover:translate-x-0.5"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div
                            class="absolute inset-0 h-[200%] w-[200%] rotate-45 translate-x-[-70%] transition-all group-hover:scale-100 bg-white/30 group-hover:translate-x-[50%] z-20 duration-1000">
                        </div>
                    </a>

                    <a href="/register"
                        class="relative inline-flex items-center justify-center px-5 py-2 overflow-hidden text-white bg-gray-500 rounded-lg group focus:ring-4 focus:ring-blue-300">
                        <span class="z-40 text-sm">Daftar</span>
                        <svg class="z-40 w-2 h-2 ml-1 -mr-0.5 transition-all duration-300 group-hover:translate-x-0.5"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div
                            class="absolute inset-0 h-[200%] w-[200%] rotate-45 translate-x-[-70%] transition-all group-hover:scale-100 bg-white/30 group-hover:translate-x-[50%] z-20 duration-1000">
                        </div>
                    </a>
                </div>
            @endguest


            {{-- Dark Mode --}}
            <div class="relative inline-block w-10 mt-1 mr-2 align-middle transition duration-200 ease-in select-none">
                <img class="w-5 h-5 mb-3 ml-4 cursor-pointer sun" src="{{ asset('img/sun.png') }}" alt="DarkMode light">
                <img class="w-5 h-5 mb-3 ml-4 cursor-pointer moon" src="{{ asset('img/moon.png') }}"
                    alt="DarkMode dark">
            </div>

            {{-- Side Bar Keranjang --}}
            <div class="relative inline-block align-middle transition duration-200 ease-in select-none">
                {{-- Script untuk side bar  --}}
                <div x-data="{ open: false }">
                    <!-- Sidebar Overlay -->
                    <div x-show="open" class="fixed inset-0 z-50 hidden overflow-hidden" id="hideKeranjang">
                        <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition-opacity ease-in duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute inset-0 transition-opacity bg-gray-700 bg-opacity-75"></div>
                        <!-- Sidebar Content -->
                        <section class="absolute inset-y-0 right-0 flex max-w-full pl-10">
                            <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                                x-transition:enter-start="transform translate-x-full"
                                x-transition:enter-end="transform translate-x-0"
                                x-transition:leave="transition-transform ease-in duration-300"
                                x-transition:leave-start="transform translate-x-0"
                                x-transition:leave-end="transform translate-x-full" class="w-screen max-w-md">
                                <div class="flex flex-col h-full py-6 bg-white shadow-xl dark:bg-gray-900">
                                    <!-- Sidebar Header -->
                                    <div class="flex items-center justify-between px-4">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">Daftar Keranjang
                                        </h2>
                                        <button x-on:click="open = false"
                                            class="text-gray-500 hover:text-gray-700 dark:text-white">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-6 h-6" x-description="Heroicon name: x"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Sidebar Content -->
                                    <div class="h-full px-4 mt-4 overflow-auto">
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <!-- Card 1 -->
                                            <div
                                                class="p-4 transition-colors duration-300 border border-gray-300 rounded-md cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                                <h3 class="mb-2 text-lg font-semibold text-black dark:text-white">Card
                                                    1</h3>
                                                <p class="text-gray-600 dark:text-white">Content for card 1.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sidebar Footer -->
                                    <div class="px-4 mt-6">
                                        <button
                                            class="flex items-center justify-center gap-1 p-2 text-sm text-white bg-black rounded-md">
                                            <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3 7C3 6.44772 3.44772 6 4 6H20C20.5523 6 21 6.44772 21 7C21 7.55228 20.5523 8 20 8H4C3.44772 8 3 7.55228 3 7ZM6 12C6 11.4477 6.44772 11 7 11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H7C6.44772 13 6 12.5523 6 12ZM9 17C9 16.4477 9.44772 16 10 16H14C14.5523 16 15 16.4477 15 17C15 17.5523 14.5523 18 14 18H10C9.44772 18 9 17.5523 9 17Z"
                                                        fill="currentColor"></path>
                                                </g>
                                            </svg> Filters </button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Open sidebar button -->
                    <button @click="open = true"
                        class="items-center px-4 pb-2 text-sm font-medium text-gray-700 transition duration-150 ease-in-out">
                        <img class="cursor-pointer w-7 h-7" src="{{ asset('img/keranjang.png') }}"
                            alt="Icon Keranjang">
                    </button>
                </div>
            </div>

            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <div class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="/"
                        class="block px-3 py-2 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                        {{ $active == 'home' ? 'text-blue-600 dark:text-blue-600' : 'text-gray-900 dark:text-white' }}"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/about"
                        class="block px-3 py-2 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                        {{ $active == 'about' ? 'text-blue-600 dark:text-blue-600' : 'text-gray-900 dark:text-white' }}"
                        aria-current="page">Tentang Kami</a>
                </li>
                <li>
                    <a href="/kategori"
                        class="block px-3 py-2 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                        {{ $active == 'kategori' ? 'text-blue-600 dark:text-blue-600' : 'text-gray-900 dark:text-white' }}"
                        aria-current="page">Kategori Buku</a>
                </li>
                <li>
                    <a href="/blog"
                        class="block px-3 py-2 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0
                        {{ $active == 'blog' ? 'text-blue-600 dark:text-blue-600' : 'text-gray-900 dark:text-white' }}"
                        aria-current="page">Blog Novelnest</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
