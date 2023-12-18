<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'module_id' => Module::inRandomOrder()->first()->code,
            'publisher' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 5, 25), // Preu entre 10 i 100
            'pages' => $this->faker->numberBetween(50, 500), // Número de pàgines
            'status' => $this->faker->randomElement(['new', 'good', 'used', 'bad']),
            'photo' => $this->faker->imageUrl(), // URL d'imatge fictícia
            'comments' => $this->faker->text,
        ];
    }
}
