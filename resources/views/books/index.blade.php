<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100">

        <!-- Main content -->
        <main class="container mx-auto px-4 py-8">
            <!-- Add new book section -->
            <div class="mb-8">
                <a href="{{ route('books.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="mr-2" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Buku
                </a>
            </div>

            <!-- Books grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($books as $book)
                <div class="bg-white shadow-md rounded-lg p-4">
                @if ($book->cover_image)
                    <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="w-full h-48 object-cover mb-4 rounded">
                @else
                    <div class="w-full h-48 bg-gray-200 mb-4 rounded flex items-center justify-center">
                        <span class="text-gray-500">No Image Available</span>
                    </div>
                @endif
                <h3 class="text-lg font-bold mb-2">
                    <a href="{{ route('books.show', $book->id) }}" class="text-blue-600 hover:text-blue-900">
                    {{ $book->title }}
                    </a>
                </h3>
                <p class="text-gray-700 mb-1">Penulis: {{ $book->author }}</p>
                <p class="text-gray-700">Tahun: {{ $book->year }}</p>
                </div>
            @endforeach
            </div>
            <!-- Pagination -->
            <div class="mt-8">
            {{ $books->links('pagination::tailwind') }}
            </div>
        </main>

</x-app-layout>