<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>
                <p><strong>Penulis:</strong> {{ $book->author }}</p>
                <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
                <p><strong>Tahun:</strong> {{ $book->year }}</p>
                <p><strong>Deskripsi:</strong> {{ $book->description }}</p>

                @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover Buku" class="mt-4 w-48">
                @endif

                <div class="mt-6">
                    <a href="{{ route('books.edit', $book->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>