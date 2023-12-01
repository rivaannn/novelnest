@extends('layouts.main')
@section('content')
    <section class="bg-gray-100">
        <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:px-8">
            <div class="max-w-3xl">
                <h2 class="text-3xl font-bold sm:text-4xl">
                    {{ $title }}
                </h2>
            </div>

            <div class="grid grid-cols-1 gap-8 mt-8 lg:grid-cols-2 lg:gap-16">
                <div class="relative h-64 overflow-hidden sm:h-80 lg:h-full">
                    <img alt="Party" src="https://source.unsplash.com/1200x800/?book"
                        class="absolute inset-0 object-cover w-full h-full" />
                </div>

                <div class="lg:py-16">
                    <article class="space-y-4 text-gray-600">
                        <p>
                        <p class="text-3xl font-bold">Awal Mula</p>
                        Website ini didirikan untuk meningkatkan kesadaran betapa pentingnya memaksimalkan potensi
                        internet melalui sebuah website. Website ini diciptakan sebagai platform daring yang inovatif
                        bagi para pembaca buku agar dapat mengakses buku dengan mudah, dan penulis buku dapat dengan
                        mudah
                        menuangkan karya tulisnya lalu membagikannya kepada semua orang.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {{-- Team  --}}
    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <div class="xl:flex xl:items-center xL:-mx-4">
                <div class="xl:w-1/2 xl:mx-4">
                    <h2 class="text-3xl font-bold sm:text-4xl">
                        Tim Pengembang </h2>

                    <p class="max-w-2xl mt-4 text-gray-500 dark:text-gray-300">
                        Kami adalah kelompok yang berdedikasi untuk menyelesaikan tugas besar dengan kreatif. Dengan
                        beragam keahlian dalam pengembangan perangkat lunak, desain, dan manajemen project, kami bekerja
                        sama untuk merancang dan mengimplementasikan pelajaran yang sudah kami pelajari untuk memenuhi
                        tantangan teknologi modern saat ini.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-0 xl:mx-4 xl:w-1/2 md:grid-cols-2">
                    <div>
                        <img class="object-cover w-full h-64 rounded-xl"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Muhamad Rivan
                            Sahronie</h1>
                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Full stack developer</p>
                    </div>

                    <div>
                        <img class="object-cover w-full h-64 rounded-xl"
                            src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Muhammad Angga
                            Kusuma</h1>

                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Front End Developer</p>
                    </div>
                    <div>
                        <img class="object-cover w-full h-64 rounded-xl"
                            src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Muhammad Rejka
                            Permana </h1>

                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Back End Developer</p>
                    </div>
                    <div>
                        <img class="object-cover w-full h-64 rounded-xl"
                            src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                            alt="">

                        <h1 class="mt-4 text-2xl font-semibold text-gray-700 capitalize dark:text-white">Yudha Prasetya</h1>

                        <p class="mt-2 text-gray-500 capitalize dark:text-gray-300">Front End Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
