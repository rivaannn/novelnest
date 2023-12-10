<!-- resources/views/dashboard/users/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detail Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-xl mx-auto">
            {{-- Button  --}}
            <div class="flex justify-end">
                <a href="{{ route('blogs.index') }}"
                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
                    Kembali
                </a>
            </div>
            {{-- End Button  --}}
            <main class="mt-10">
                <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                    <div class="absolute left-0 bottom-0 w-full h-full z-10"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                    <img src="{{ asset('public/' . $blog->image) }}" alt="blog"
                        class="absolute
                        left-0 top-0 w-full h-full z-0 object-cover" />
                    <div class="p-4 absolute bottom-0 left-0 z-20">
                        <a href="#"
                            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $blog->category }}</a>
                        <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                            {{ $blog->title }}
                        </h2>
                        <h2 class="text-xl font-semibold text-gray-100 leading-tight">
                            {{ $blog->slug }}
                        </h2>
                        <div class="flex mt-3">
                            <img src="https://randomuser.me/api/portraits/men/97.jpg"
                                class="h-10 w-10 rounded-full mr-2 object-cover" />
                            <div>
                                <p class="font-semibold text-gray-200 text-sm"> Mike Sullivan </p>
                                <p class="font-semibold text-gray-400 text-xs"> 14 Aug </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
                    <p class="pb-6">{{ $blog->body }}</p>
                </div>
            </main>
        </div>
    </div>
    </div>
    </div>
    </div>
    @include('partials.footer')
</x-app-layout>
