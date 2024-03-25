<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        return [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'review_amount' => $this->faker->numberBetween(),
            'review_content' => $this->faker->paragraph,
            'is_public' => $this->faker->boolean(),
        ];
    }
}
