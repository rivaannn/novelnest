<nav class="fixed top-0 z-20 w-full bg-white border-b border-gray-200 dark:bg-gray-900 start-0 dark:border-gray-600">
    <div class="flex flex-wrap items-center justify-between p-4 mx-auto max-w-screen-2xl">
        <a href="/" class="flex items-center ml-10 space-x-3 rtl:space-x-reverse">
            <img class="h-10" src="/img/logo.png" class="h-8 " alt="Novelnest">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">NovelNest</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
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
                        <a href="/dashboard"
                            class="block px-4 py-2 transition duration-150 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard</a>
                        <a href="/dashboarduser"
                            class="block px-4 py-2 transition duration-150 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-700">Dashboard
                            User</a>
                        <a href="/profile"
                            class="block px-4 py-2 transition duration-150 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 py-2 transition duration-150 ease-in-out hover:bg-gray-100 dark:hover:bg-gray-700 text-start">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="inline mx-auto">
                    <a href="/login"
                        class="inline-flex items-center justify-center px-6 py-2 text-sm text-white bg-blue-600 rounded-full hover:bg-blue-700">
                        <span>Masuk</span>
                    </a>
                    <a href="/register"
                        class="inline-flex items-center justify-center px-6 py-2 text-sm text-gray-600 bg-gray-300 rounded-full hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                        <span>Daftar</span>
                    </a>
                </div>
            @endguest

            <div class="py-2 pl-7">
                <img class="w-5 cursor-pointer sun " src="{{ asset('img/sun.png') }}" alt="DarkMode light">
                <img class="w-5 cursor-pointer moon " src="{{ asset('img/moon.png') }}" alt="DarkMode dark">
            </div>

            <a href="/keranjang" class="py-2 pl-8">
                <img class="w-6 h-6 cursor-pointer" src="{{ asset('img/keranjang.png') }}" alt="Icon Keranjang">
            </a>

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

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
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
