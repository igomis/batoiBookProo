<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $json = Storage::disk('public')->get('families.json'); // Nom del teu fitxer
        $data = json_decode($json, true);

        foreach ($data[2]['data'] as $item) {
            Family::create([
                'id' => $item['id'],
                'cliteral' => $item['cliteral'],
                'vliteral' => $item['vliteral']
            ]);
        }
    }
}
