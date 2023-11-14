<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BudgetItem>
 */
class BudgetItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'budget_category_id' => null,
            'item_name' => fake()->sentence(3),
            'expected_cost' => fake()->numberBetween(1000000,10000000),
            'actual_costs' => fake()->numberBetween(1000000,10000000),
        ];
    }
}
