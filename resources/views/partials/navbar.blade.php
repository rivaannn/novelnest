<nav
    class="fixed top-0 z-40 w-full bg-white border-b border-gray-200 shadow-sm dark:bg-gray-900 start-0 dark:border-gray-600">
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

            <div class="flex items-center justify-center">
                <img class="w-5 h-5 ml-4 cursor-pointer sun" src="{{ asset('img/sun.png') }}" alt="DarkMode light">
                <img class="w-5 h-5 ml-4 cursor-pointer moon" src="{{ asset('img/moon.png') }}" alt="DarkMode dark">
                {{-- Script untuk side bar  --}}
                <div x-data="{ open: false }">
                    <!-- Sidebar Overlay -->
                    <div x-show="open" class="fixed inset-0 z-50 hidden overflow-hidden" id="hideKeranjang">
                        <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition-opacity ease-in duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute inset-0 transition-opacity bg-gray-500 dark:bg-gray-900 dark:bg-opacity-75 bg-opacity-75"></div>
                        <!-- Sidebar Content -->
                        <section class="absolute inset-y-0 right-0 flex max-w-full pl-10">
                            <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                                x-transition:enter-start="transform translate-x-full"
                                x-transition:enter-end="transform translate-x-0"
                                x-transition:leave="transition-transform ease-in duration-300"
                                x-transition:leave-start="transform translate-x-0"
                                x-transition:leave-end="transform translate-x-full" class="w-screen max-w-md">
                                <div class="flex flex-col h-full py-6 bg-white shadow-xl dark:bg-gray-800 dark:text-white">
                                    <!-- Sidebar Header -->
                                    <div class="flex items-center justify-between px-4">
                                        <h2 class="text-xl font-semibold ">Daftar Keranjang</h2>
                                        <button x-on:click="open = false" class="text-gray-500 hover:text-gray-700">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-6 h-6" x-description="Heroicon name: x"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <form action="{{ route('order.keranjang') }}" method="post" class="flex flex-col gap-2">
                                        <!-- Sidebar Content -->
                                        <div class="h-4/6 p-2 bg-gray-100 px-4 mt-4 overflow-y-auto w-full">
                                            <div class="flex flex-col">
                                                @if ($keranjangBuku)
                                                @foreach ($keranjangBuku as $key => $book)
                                                <div class="flex w-full h-40">
                                                    <div class="w-1/4">
                                                        <img class="object-cover object-center w-20 rounded h-20 mb-2" src="https://source.unsplash.com/1200x800/?book/{{ $book->id }}" alt="Book Image">
                                                    </div>
                                                    <div class="w-3/4">
                                                        <input type="hidden" name="books[{{ $key }}]-id" value="{{ $book->id }}">
                                                        <p class="font-bold">{{ $book->title }}</p>
                                                        <p class="text-sm">{{ $book->description }}</p>
                                                        <div class="flex items-center gap-3 mt-2">
                                                            <span>Jumlah Buku </span>
                                                            <input type="number" name="books[{{ $key }}]-quantity" id="books-{{ $key }}-number-input" min="1" aria-describedby="helper-text-explanation" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" value="1" required>
                                                            <div>
                                                                <a href="{{ route('remKeranjang', array('book_id' => $book->id)) }}">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div class="h-40 w-full text-center text-gray-400 dark:text-gray-800">Keranjang Masih Kosong</div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Sidebar Footer -->
                                        <div class="px-4 mt-2 w-full">
                                            <button type="submit" class="border w-full bg-blue-600 py-4 text-white font-bold rounded-xl">
                                                Checkout
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Open sidebar button -->
                    <button x-on:click="open = true" class="px-4 py-2">
                        <img class="ml-3 cursor-pointer w-7 h-7" src="{{ asset('img/keranjang.png') }}"
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
