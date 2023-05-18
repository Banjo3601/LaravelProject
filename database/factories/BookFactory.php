<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class BookFactory extends Factory
{
    protected $model = Book::class;
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence,
            'year' => $this->faker->year,
            'author' => $this->faker->name,
        ];
    }
}
