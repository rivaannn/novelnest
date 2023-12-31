<!-- resources/views/dashboard/users/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="email"
                                class="block text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="w-full p-2 mt-1 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label"></label>
                            <input type="hidden" name="oldImage" value="{{ $user->image }}">

                            <div class="img-preview-container">
                                @if ($user->image)
                                    <img src="{{ asset('storage/' . $user->image) }}"
                                        class="object-cover mt-2 mb-3 w-15 h-15 img-preview rounded-xl">
                                @else
                                    <img class="object-cover mt-2 mb-3 w-15 h-15 img-preview rounded-xl"
                                        style="display: none;">
                                @endif
                            </div>

                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                id="image" name="image" onchange="previewImage()">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('users.index') }}"
                                class="inline-block px-4 py-2 mr-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                {{ __('Update User') }}
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
