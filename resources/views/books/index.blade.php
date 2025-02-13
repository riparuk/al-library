<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of Books') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-white dark:bg-gray-900">

        <!-- Main content -->
        <main class="container mx-auto px-4 py-8">
            <!-- Add new book section -->
            <div class="mb-8">
                <a href="{{ route('books.create') }}" class="bg-emerald-400 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="mr-2" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Add Book
                </a>
            </div>

            <!-- Books grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                    <a href="{{ route('books.show', $book->id) }}" class="block rounded-lg overflow-hidden bg-gray-50 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">
                        <!-- Cover Image -->
                        <img src="{{ asset($book->cover_image ? 'storage/' . $book->cover_image : 'storage/covers/no-image.png') }}" alt="Cover {{ $book->title }}" class="w-1/2 h-56 object-cover mx-auto">

                        <!-- Content -->
                        <div class="p-4">
                            <h3 class="text-base font-bold text-gray-800 dark:text-gray-200">{{ $book->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 font-light">By <span class="font-bold">{{ $book->author }}</span></p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm font-extralight">Published in {{ $book->year }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
            {{ $books->links('pagination::tailwind') }}
            </div>
        </main>

</x-app-layout>