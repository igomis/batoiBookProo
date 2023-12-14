<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
