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
                    class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded-full hover:bg-blue-500 hover:text-white hover:border-transparent">
                    Kembali
                </a>
            </div>
            {{-- End Button  --}}
            <main class="mt-10">
                <div class="relative w-full max-w-screen-md mx-auto mb-4 md:mb-0" style="height: 24em;">
                    <div class="absolute bottom-0 left-0 z-10 w-full h-full"
                        style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                    <img src="https://source.unsplash.com/1200x800/?book" alt="blog"
                        class="absolute top-0 left-0 z-0 object-cover w-full h-full" />
                    <div class="absolute bottom-0 left-0 z-20 p-4">
                        <span
                            class="inline-flex items-center justify-center px-4 py-1 mb-2 text-gray-200 bg-black">{{ $blog->category }}</span>
                        <h2 class="text-4xl font-semibold leading-tight text-gray-100">
                            {{ $blog->title }}
                        </h2>
                        <h2 class="text-xl font-semibold leading-tight text-gray-100">
                            {{ $blog->slug }}
                        </h2>
                        <div class="flex mt-3">
                            <img src="https://randomuser.me/api/portraits/men/97.jpg"
                                class="object-cover w-10 h-10 mr-2 rounded-full" />
                            <div>
                                <p class="text-sm font-semibold text-gray-200"> {{ $blog->author }} </p>
                                <p class="text-xs font-semibold text-gray-400"> {{ $blog->created_at->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-screen-md px-4 mx-auto mt-12 text-lg leading-relaxed text-gray-700 lg:px-0">
                    {!! $blog->body !!}
                </div>

            </main>
        </div>
    </div>
    </div>
    </div>
    </div>
    @include('partials.footer')
</x-app-layout>
