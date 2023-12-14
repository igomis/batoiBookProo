<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $json = Storage::disk('public')->get('courses.json'); // Nom del teu fitxer
        $data = json_decode($json, true);

        foreach ($data[2]['data'] as $item) {
            Course::create([
                'id' => $item['id'],
                'cycle' => $item['cycle'],
                'families_id' => $item['idFamily'],
                'cliteral' => $item['cliteral'],
                'vliteral' => $item['vliteral']
            ]);
        }
    }
}
