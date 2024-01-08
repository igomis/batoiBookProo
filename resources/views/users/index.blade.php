<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuaris') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-4">
        <table class="table-auto w-full mt-4">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Id</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <!-- Altres capsaleres de taula -->
                <th class="px-4 py-2">Accions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <!-- Altres camps de llibre -->
                    <td class="border px-4 py-2">
                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
