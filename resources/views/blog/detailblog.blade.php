@extends('layouts.main')

@section('content')
    <div class="py-12">
        <div class="max-w-screen-xl mx-auto">
            {{-- Button  --}}
            <div class="flex justify-end mt-12">
                <a href="{{ url('/blog') }}"
                    class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded-full hover:bg-blue-500 hover:text-white hover:border-transparent">
                    Kembali
                </a>
            </div>
            {{-- End Button  --}}
            <main class="mt-10">
                <div class="relative w-full max-w-screen-md mx-auto mb-4 md:mb-0" style="height: 24em;">
                    <div class="absolute bottom-0 left-0 z-10 w-full h-full"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                    <img src="{{ asset('public/' . $blogs->image) }}" alt="blog"
                        class="absolute top-0 left-0 z-0 object-cover w-full h-full" />
                    <div class="absolute bottom-0 left-0 z-20 p-4">
                        <a href="#"
                            class="inline-flex items-center justify-center px-4 py-1 mb-2 text-gray-200 bg-black">{{ $blogs->category }}</a>
                        <h2 class="text-4xl font-semibold leading-tight text-gray-100">
                            {{ $blogs->title }}
                        </h2>
                        <h2 class="text-xl font-semibold leading-tight text-gray-100">
                            {{ $blogs->slug }}
                        </h2>
                        <div class="flex mt-3">
                            <img src="https://randomuser.me/api/portraits/men/97.jpg"
                                class="object-cover w-10 h-10 mr-2 rounded-full" />
                            <div>
                                <p class="text-sm font-semibold text-gray-200"> Mike Sullivan </p>
                                <p class="text-xs font-semibold text-gray-400"> 14 Aug </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-screen-md px-4 mx-auto mt-12 text-lg leading-relaxed text-gray-700 lg:px-0">
                    <p class="pb-6">{{ $blogs->body }}</p>
                </div>
            </main>
        </div>
    </div>
@endsection
