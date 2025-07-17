<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    protected $model = Quote::class;

    public function definition(): array
    {
        return [
            'display_date' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function forToday(): static
    {
        return $this->state(fn (array $attributes) => [
            'display_date' => now()->toDateString(),
        ]);
    }
}