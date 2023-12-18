<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sale::class;

    public function definition()
    {
        $soldDate = $this->faker->dateTimeBetween('-1 years', 'now');
        $book = Book::factory()->create([
            'soldDate' => $soldDate->format('Y-m-d'), // Data de l'any passat
        ]);

        return [
            'book_id' => $book->id,
            'user_id' => User::inRandomOrder()->first()->id, // Usuari aleatori
            'date' => $soldDate->format('Y-m-d'), // Data de l'any passat
            'status' => $this->faker->randomElement([0,1,2]), // 0: pendent, 1: acceptada, 2: rebutjada
        ];
    }
}
