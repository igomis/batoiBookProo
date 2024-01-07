<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white p-4">
    @if ($book->photo)
        <img class="w-1/2" src="{{ asset($book->photo) }}" alt="Imatge de {{ $book->title }}">
    @endif
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $book->title }}</div>
        <p class="text-gray-700 text-base">
            Editorial: {{ $book->publisher }}
        </p>
        <p class="text-gray-700 text-base">
            Preu: {{ $book->price }}€
        </p>
        <p class="text-gray-700 text-base">
            Pàgines: {{ $book->pages }}
        </p>
        <p class="text-gray-700 text-base">
            Estat: {{ $book->status }}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        @if($book->comments)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            {{ $book->comments }}
        </span>
        @endif
    </div>
</div>
