<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mostrar Llibre') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <div class="mb-4">
            <x-book-card book="{{$book->id}}" />
            <p>{{$message}}</p>
        </div>
    </div>
</x-app-layout>

