<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://swapi.dev/api/people/');
        if ($response->successful()) {
            $people = $response->json()['results'];
            foreach ($people as $person) {
                User::create([
                    'name' => $person['name'],
                    'email' => $person['name'].'@example.com',
                    'password' => bcrypt('1234'),
                    'administrador' => false,
                ]);
            }
        }
        // Crear un administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234'),
            'administrador' => true, // Asumint que tens aquest camp en el teu model User
        ]);

        // Crear 100 usuaris normals
        User::factory()->count(100)->create([
            'password' => bcrypt('1234'),
            'administrador' => false,
        ]);

    }
}
