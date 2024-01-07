<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vendes') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <table class="table-auto w-full mt-4">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Mòdul</th>
                <th class="px-4 py-2">Cicle</th>
                <th class="px-4 py-2">Preu</th>
                <th class="px-4 py-2">Venedor</th>
                <th class="px-4 py-2">Comprador</th>
                <th class="px-4 py-2">Data</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td class="border px-4 py-2 text-white">{{ $sale->Book->Module->vliteral }}</td>
                    <td class="border px-4 py-2 text-white">{{ $sale->Book->Module->Course->vliteral }}</td>
                    <td class="border px-4 py-2 text-white">{{ $sale->Book->price }}</td>
                    <td class="border px-4 py-2 text-white">{{ $sale->Book->User->name }}</td>
                    <td class="border px-4 py-2 text-white">{{ $sale->Comprador->name }}</td>
                    <td class="border px-4 py-2 text-white">{{ $sale->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $sales->links() }}
    </div>
</x-app-layout>
