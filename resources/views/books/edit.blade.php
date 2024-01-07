<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Llibre') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <h1 class="text-xl font-bold mb-4">Editar Llibre</h1>
        <!-- Mostrar Errors de Validació -->
        @include('partials.validation-errors')
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="module_id" class="block text-gray-700 text-sm font-bold mb-2">Mòdul ID:</label>
                <select name="module_id" id="module_id" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    @foreach (\App\Models\Module::all() as $module)
                        <option value="{{ $module->code }}"
                            {{ old('module_id', $book->module_id) == $module->code ? 'selected' : '' }}>
                            {{ $module->vliteral }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Resta de camps amb valors existents del llibre -->
            <div class="mb-4">
                <label for="publisher" class="block text-gray-700 text-sm font-bold mb-2">Editorial:</label>
                <input type="text" name="publisher" id="publisher"
                       value="{{ old('publisher', $book->publisher) }}"
                       class="shadow border rounded w-full py-2 px-3 text-gray-700"
                >
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Preu:</label>
                <input type="number" name="price" id="price"
                       value="{{old('price',$book->price) }}"
                       class="shadow border rounded w-full py-2 px-3 text-gray-700"
                >
            </div>

            <div class="mb-4">
                <label for="pages" class="block text-gray-700 text-sm font-bold mb-2">Pàgines:</label>
                <input type="number" name="pages" id="pages"
                       value="{{ old('pages', $book->pages) }}"
                       class="shadow border rounded w-full py-2 px-3 text-gray-700"
                >
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Estat:</label>
                <select name="status" id="status" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    <option value="new" {{ old('status', $book->status) == 'new' ? 'selected' : '' }}>Nou</option>
                    <option value="good" {{ old('status', $book->status) == 'good' ? 'selected' : '' }}>Bo</option>
                    <option value="used" {{ old('status', $book->status) == 'used' ? 'selected' : '' }}>Usat</option>
                    <option value="bad" {{ old('status', $book->status) == 'bad' ? 'selected' : '' }}>Dolent</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Foto:</label>
                <input type="file" name="photo" id="photo" class="shadow border rounded w-full py-2 px-3 text-gray-700">
            </div>

            <div class="mb-4">
                <label for="comments" class="block text-gray-700 text-sm font-bold mb-2">Comentaris:</label>
                <textarea name="comments" id="comments" rows="3" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    {{old('comments', $book->comments)}}
                </textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                Actualitzar Llibre
            </button>
        </form>
    </div>
</x-app-layout>

