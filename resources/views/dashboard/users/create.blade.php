<!-- resources/views/dashboard/users/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Buat Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-slate-900">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Nama</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                        </div>

                        <div class="mb-4">
                            <label for="password"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Kata Sandi</label>
                            <input type="password" name="password" id="password"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Konfirmasi Kata
                                Sandi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500 dark:bg-slate-700">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <img class="object-cover mt-2 mb-3 w-25 h-25 img-preview rounded-xl">
                            <input class="form-control dark:bg-slate-700 @error('image') is-invalid @enderror"
                                type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('users.index') }}"
                                class="inline-block px-4 py-2 text-gray-200 bg-gray-500 rounded-md me-2 hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Buat Pengguna') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')

    {{-- Sripct Js --}}
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</x-app-layout>
