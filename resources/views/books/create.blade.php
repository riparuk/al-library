<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xxl text-gray-800 leading-tight">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100">

        <!-- Main content -->
        <main class="container mx-auto px-4 py-8">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" 
            x-data="bookForm()" @submit.prevent="submitForm" class="bg-white shadow-md rounded-lg overflow-hidden p-6 max-w-2xl mx-auto">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Cover Image</label>
                    <input type="file" name="cover_image" class="w-full p-2 border rounded">
                </div>

                <div class="space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" id="title" name="title" x-model="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        <p class="text-red-500 text-sm" x-show="errors.title" x-text="errors.title"></p>
                    </div>

                    <!-- Penulis -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                        <input type="text" id="author" name="author" x-model="author" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        <p class="text-red-500 text-sm" x-show="errors.author" x-text="errors.author"></p>
                    </div>

                    <!-- Penerbit -->
                    <div>
                        <label for="publisher" class="block text-sm font-medium text-gray-700">Penerbit</label>
                        <input type="text" id="publisher" name="publisher" x-model="publisher" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        <p class="text-red-500 text-sm" x-show="errors.publisher" x-text="errors.publisher"></p>
                    </div>

                    <!-- Tahun Terbit -->
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                        <input type="number" id="year" name="year" x-model="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        <p class="text-red-500 text-sm" x-show="errors.year" x-text="errors.year"></p>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" x-model="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required></textarea>
                        <p class="text-red-500 text-sm" x-show="errors.description" x-text="errors.description"></p>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </a>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!-- Alpine.js Logic -->
    <script>
        function bookForm() {
            return {
                title: "{{ old('title') }}",
                author: "{{ old('author') }}",
                publisher: "{{ old('publisher') }}",
                year: "{{ old('year') }}",
                description: "{{ old('description') }}",
                errors: {},
                
                validate() {
                    this.errors = {};

                    if (!this.title) this.errors.title = "Judul wajib diisi.";
                    if (!this.author) this.errors.author = "Penulis wajib diisi.";
                    if (!this.publisher) this.errors.publisher = "Penerbit wajib diisi.";

                    if (!this.year) {
                        this.errors.year = "Tahun terbit wajib diisi.";
                    } else if (this.year < 1000 || this.year > new Date().getFullYear()) {
                        this.errors.year = "Tahun terbit harus antara 1000 dan " + new Date().getFullYear();
                    }

                    if (!this.description) this.errors.description = "Deskripsi wajib diisi.";

                    return Object.keys(this.errors).length === 0;
                },

                submitForm(event) {
                    if (this.validate()) {
                        event.target.submit();
                    }
                }
            }
        }
    </script>
</x-app-layout>