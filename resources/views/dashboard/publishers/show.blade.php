<!-- resources/views/dashboard/users/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Publisher Details') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-fit">
        <div class="flex items-center justify-center overflow-hidden bg-white border rounded-lg shadow">
            <div class="px-4 py-5 sm:px-6">
                <img class="object-cover w-full h-64 rounded-xl"
                    src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                    alt="">
                <h3 class="mt-4 text-lg font-medium leading-6 text-gray-900">
                    Profil Publisher
                </h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Seputar Informasi terkait profil publisher.
                </p>
            </div>
            <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Nama Publisher :') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $publishers->nama }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Kode Publisher :') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $publishers->code }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Dibuat pada :') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{-- {{ $publishers->created_at->format('d F Y H:i') }} --}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('publishers.index') }}" class="ms-auto">
                <button
                    class="flex items-end px-6 py-2 ml-auto text-white bg-gray-500 border-0 rounded-full focus:outline-none hover:bg-gray-600">Kembali
                </button>
            </a>
        </div>
    </div>
    </div>
    </div>
    </div>
    @include('partials.footer')
</x-app-layout>
