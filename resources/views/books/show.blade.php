<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg">
                @if($book->cover_image)
                    <div class="flex justify-center bg-white dark:bg-gray-700 rounded-lg">
                        <img src="{{ asset('/storage/' . $book->cover_image) }}" alt="Book Cover" class="w-1/2">
                    </div>
                @else
                    <div class="flex justify-center bg-white dark:bg-gray-700 rounded-lg">
                        <img src="/storage/covers/no-image.png" alt="No Image" class="w-1/2">
                    </div>
                @endif
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">{{ $book->title }}</h1>
                    <p class="text-gray-600 dark:text-gray-400 font-light">By <span class="font-bold">{{ $book->author }}</span></p>
                    <p class="text-gray-600 dark:text-gray-400 font-light">Publisher <span class="font-bold">{{ $book->publisher }}</span></p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-extralight">Published in {{ $book->year }}</p>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 font-thin">{{ $book->description }}</p>

                    <div class="mt-6">
                        <a href="{{ route('books.edit', $book->id) }}" class="bg-slate-500 dark:bg-slate-700 text-white px-4 py-2 rounded ml-2">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400 dark:bg-red-600 text-white px-4 py-2 rounded ml-2" onclick="return confirm('Are you sure want to delete this book?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>