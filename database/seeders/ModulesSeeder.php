<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Family;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $json = Storage::disk('public')->get('modules.json'); // Nom del teu fitxer
        $data = json_decode($json, true);

        foreach ($data[2]['data'] as $item) {
            Module::create([
                'code' => $item['code'],
                'cliteral' => $item['cliteral'],
                'vliteral' => $item['vliteral'],
                'courses_id' => $item['idCycle'],
            ]);
        }
    }
}
