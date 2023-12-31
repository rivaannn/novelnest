<x-appuser>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Daftar Order') }}
        </h2>
    </x-slot>

    <div class="px-4 py-14 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
        <div class="flex flex-col justify-start space-y-2 item-start">
            <h1 class="text-3xl font-semibold leading-7 text-gray-800 dark:text-white lg:text-4xl lg:leading-9">Order
                Buku</h1>
            @if ($books->isNotEmpty())
                <p class="text-base font-medium leading-6 text-gray-600 dark:text-gray-300">
                    {{ $books->first()->updated_at->format('d F Y \a\t H:i') }}
                </p>
            @endif
        </div>

        <div
            class="flex flex-col items-stretch w-full mt-10 space-y-4 xl:flex-row jusitfy-center xl:space-x-8 md:space-y-6 xl:space-y-0">
            <div class="flex flex-col items-start justify-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                <div
                    class="flex flex-col items-start justify-start w-full px-4 py-4 dark:bg-gray-800 bg-gray-50 md:py-6 md:p-6 xl:p-8">
                    <p class="text-lg font-semibold leading-6 text-gray-800 md:text-xl dark:text-white xl:leading-5">
                        Order Buku</p>

                    @if (!empty($keranjangBuku) && is_array($keranjangBuku))
                        @foreach ($keranjangBuku as $bookId)
                            @php
                                $book = \App\Models\Books::find($bookId);
                            @endphp
                            @if ($book)
                                <div
                                    class="flex flex-col items-start justify-start w-full mt-4 md:mt-6 md:flex-row md:items-center md:space-x-6 xl:space-x-8">
                                    <div class="w-full pb-4 md:pb-8 md:w-40">
                                        <img class="hidden w-full md:block"
                                            src="https://source.unsplash.com/1200x800/?books" alt="book" />
                                        <img class="w-full md:hidden" src="https://source.unsplash.com/1200x800/?books"
                                            alt="book" />
                                    </div>
                                    <div
                                        class="flex flex-col items-start justify-between w-full pb-8 space-y-4 border-b border-gray-200 md:flex-row md:space-y-0">
                                        <div class="flex flex-col items-start justify-start w-full space-y-8">
                                            <h3
                                                class="text-xl font-semibold leading-6 text-gray-800 dark:text-white xl:text-2xl">
                                                {{ $book->title }}
                                            </h3>
                                            <div class="flex flex-col items-start justify-start space-y-2">
                                                <p class="text-sm leading-none text-gray-800 dark:text-white">
                                                    <span class="text-gray-300 dark:text-gray-400">Code Buku: </span>
                                                    {{ $book->book_number }}
                                                </p>
                                                <p class="text-sm leading-none text-gray-800 dark:text-white">
                                                    <span class="text-gray-300 dark:text-gray-400">Penulis: </span>
                                                    {{ $book->writter->name }}
                                                </p>
                                                <p class="text-sm leading-none text-gray-800 dark:text-white">
                                                    <span class="text-gray-300 dark:text-gray-400">Publisher: </span>
                                                    {{ $book->publisher->nama }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-start justify-between w-full space-x-8">
                                            <p class="text-base leading-6 dark:text-white xl:text-lg">
                                                {{ 'RP.' . number_format($book->price, 2, ',', '.') }}
                                            </p>
                                            <span class="text-lg dark:text-white">Jumlah Buku </span>
                                            <input type="number" name="books-quantity" min="1"
                                                aria-describedby="helper-text-explanation"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="1" value="1" required>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="w-full h-40 text-4xl text-center text-red-700 mt-28 dark:text-red-700">
                            Order Masih Kosong
                        </div>
                    @endif
                </div>

                <div
                    class="flex flex-col items-stretch justify-center w-full space-y-4 md:flex-row md:space-y-0 md:space-x-6 xl:space-x-8">
                    <div class="flex flex-col w-full px-4 py-6 space-y-6 md:p-6 xl:p-8 bg-gray-50 dark:bg-gray-800">
                        <h3 class="text-xl font-semibold leading-5 text-gray-800 dark:text-white">Summary</h3>
                        <div
                            class="flex flex-col items-center justify-center w-full pb-4 space-y-4 border-b border-gray-200">
                            <div class="flex justify-between w-full">
                                <p class="text-base leading-4 text-gray-800 dark:text-white">Subtotal</p>
                                <p class="text-base leading-4 text-gray-600 dark:text-gray-300">$56.00</p>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base leading-4 text-gray-800 dark:text-white">Discount <span
                                        class="p-1 text-xs font-medium leading-3 text-gray-800 bg-gray-200 dark:bg-white dark:text-gray-800">STUDENT</span>
                                </p>
                                <p class="text-base leading-4 text-gray-600 dark:text-gray-300">-$28.00 (50%)</p>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base leading-4 text-gray-800 dark:text-white">Shipping</p>
                                <p class="text-base leading-4 text-gray-600 dark:text-gray-300">$8.00</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base font-semibold leading-4 text-gray-800 dark:text-white">Total</p>
                            <p class="text-base font-semibold leading-4 text-gray-600 dark:text-gray-300">$36.00</p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col justify-center w-full px-4 py-6 space-y-6 md:p-6 xl:p-8 bg-gray-50 dark:bg-gray-800">
                        <h3 class="text-xl font-semibold leading-5 text-gray-800 dark:text-white">Shipping</h3>
                        <div class="flex items-start justify-between w-full">
                            <div class="flex items-center justify-center space-x-4">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full" alt="logo"
                                        src="https://i.ibb.co/L8KSdNQ/image-3.png" />
                                </div>
                                <div class="flex flex-col items-center justify-start">
                                    <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-white">DPD
                                        Delivery<br /><span class="font-normal">Delivery with 24 Hours</span></p>
                                </div>
                            </div>
                            <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-white">$8.00</p>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <button
                                class="py-5 text-base font-medium leading-4 text-white bg-gray-800 hover:bg-black dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 w-96 md:w-full">View
                                Carrier Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col items-center justify-between w-full px-4 py-6 bg-gray-50 dark:bg-gray-800 xl:w-96 md:items-start md:p-6 xl:p-8">
                <h3 class="text-xl font-semibold leading-5 text-gray-800 dark:text-white">Pengguna</h3>
                <div
                    class="flex flex-col items-stretch justify-start w-full h-full md:flex-row xl:flex-col md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col items-start justify-start flex-shrink-0">
                        @if ($users)
                            <div
                                class="flex items-center justify-center w-full py-8 space-x-4 border-b border-gray-200 md:justify-start">
                                @if (optional($users)->image)
                                    <img src="{{ asset('storage/' . $users->image) }}" alt="Foto Profile"
                                        class="w-20 h-20 mt-2">
                                @endif
                                <div class="flex flex-col items-start justify-start space-y-2">
                                    <p
                                        class="text-base font-semibold leading-4 text-left text-gray-800 dark:text-white">
                                        {{ $users->name }}
                                    </p>
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-center w-full py-4 space-x-4 text-gray-800 border-b border-gray-200 dark:text-white md:justify-start">
                                <img class="dark:hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1.svg"
                                    alt="email">
                                <img class="hidden dark:block"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1dark.svg"
                                    alt="email">
                                <p class="text-sm leading-5 cursor-pointer">{{ $users->email }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col items-stretch justify-between w-full mt-6 xl:h-full md:mt-0">
                        <div
                            class="flex flex-col items-center justify-center space-y-4 md:justify-start xl:flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 xl:space-y-12 md:space-y-0 md:flex-row md:items-start">
                            <div
                                class="flex flex-col items-center justify-center space-y-4 md:justify-start md:items-start xl:mt-8">
                                <p
                                    class="text-base font-semibold leading-4 text-center text-gray-800 dark:text-white md:text-left">
                                    Shipping Address</p>
                                <p
                                    class="w-48 text-sm leading-5 text-center text-gray-600 lg:w-full dark:text-gray-300 xl:w-48 md:text-left">
                                    180 North King Street, Northhampton MA 1060</p>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center space-y-4 md:justify-start md:items-start">
                                <p
                                    class="text-base font-semibold leading-4 text-center text-gray-800 dark:text-white md:text-left">
                                    Billing Address</p>
                                <p
                                    class="w-48 text-sm leading-5 text-center text-gray-600 lg:w-full dark:text-gray-300 xl:w-48 md:text-left">
                                    180 North King Street, Northhampton MA 1060</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-center w-full md:justify-start md:items-start">
                            <button
                                class="py-5 mt-6 text-base font-medium leading-4 text-gray-800 border border-gray-800 md:mt-0 dark:border-white dark:hover:bg-gray-900 dark:bg-transparent dark:text-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 w-96 2xl:w-full">Edit
                                Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-appuser>
