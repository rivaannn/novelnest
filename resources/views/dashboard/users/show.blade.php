<!-- resources/views/dashboard/users/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto max-w-fit">
        <div class="flex items-center justify-center overflow-hidden bg-white border rounded-lg shadow">
            <div class="px-4 py-5 sm:px-6">
                @if (substr($user->image, 0, 4) == 'http')
                    <img src="{{ $user->image }}" alt="Foto Profile" class="object-cover w-full h-64 mt-2 rounded-xl">
                @else
                    <img src="{{ asset('storage/' . $user->image) }}" alt="Foto Profile"
                        class="object-cover w-full h-64 mt-2 rounded-xl">
                @endif
                <h3 class="mt-4 text-lg font-medium leading-6 text-gray-900">
                    Profil Pengguna
                </h3>
                <p class="max-w-2xl mt-1 text-sm text-gray-500">
                    Seputar Informasi terkait profil pengguna.
                </p>
            </div>
            <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Nama Pengguna :') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->name }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Email Pengguna :') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->email }}
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Role Pengguna :') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            Admin
                        </dd>
                    </div>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Dibuat pada :') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->created_at->format('d F Y') }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('users.index') }}" class="ms-auto">
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
