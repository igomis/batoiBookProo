<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Llibres') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Afegir Llibre
        </a>
        <table class="table-auto w-full mt-4">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Mòdul</th>
                <th class="px-4 py-2">Cicle</th>
                <th class="px-4 py-2">Editorial</th>
                <th class="px-4 py-2">Preu</th>
                <!-- Altres capsaleres de taula -->
                <th class="px-4 py-2">Accions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td class="border px-4 py-2">{{ $book->Module->vliteral }}</td>
                    <td class="border px-4 py-2">{{ $book->Module->Course->vliteral }}</td>
                    <td class="border px-4 py-2">{{ $book->publisher }}</td>
                    <td class="border px-4 py-2">{{ $book->price }}</td>
                    <!-- Altres camps de llibre -->
                    <td class="border px-4 py-2">
                        <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:text-blue-900">Veure</a>
                        <a href="{{ route('books.edit', $book) }}" class="text-green-600 hover:text-green-900">Editar</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>
</x-app-layout>
