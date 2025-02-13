<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Main content -->
        <main class="container mx-auto px-4 py-8">
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data"
                x-data="bookForm()" @submit.prevent="submitForm($event)"
                class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden p-6 max-w-2xl mx-auto">
                
                @csrf
                @method('PUT')

                <!-- Cover Image -->
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300">Cover Image</label>
                    <input type="file" name="cover_image" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-gray-300">
                </div>

                <div class="space-y-6">
                    <!-- Judul -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                        <input type="text" id="title" name="title" x-model="title"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300" required>
                        <p class="text-red-500 text-sm" x-show="errors.title" x-text="errors.title"></p>
                    </div>

                    <!-- Penulis -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                        <input type="text" id="author" name="author" x-model="author"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300" required>
                        <p class="text-red-500 text-sm" x-show="errors.author" x-text="errors.author"></p>
                    </div>

                    <!-- Penerbit -->
                    <div>
                        <label for="publisher" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penerbit</label>
                        <input type="text" id="publisher" name="publisher" x-model="publisher"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300" required>
                        <p class="text-red-500 text-sm" x-show="errors.publisher" x-text="errors.publisher"></p>
                    </div>

                    <!-- Tahun Terbit -->
                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun Terbit</label>
                        <input type="number" id="year" name="year" x-model="year"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300" required>
                        <p class="text-red-500 text-sm" x-show="errors.year" x-text="errors.year"></p>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                        <textarea id="description" name="description" rows="4" x-model="description"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300" required></textarea>
                        <p class="text-red-500 text-sm" x-show="errors.description" x-text="errors.description"></p>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </main>
    </div>

    <!-- Alpine.js Logic -->
    <script>
        function bookForm() {
            return {
                title: @json($book->title),
                author: @json($book->author),
                publisher: @json($book->publisher),
                year: @json($book->year),
                description: @json($book->description),
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