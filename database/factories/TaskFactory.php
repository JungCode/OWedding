<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BudgetCategory>
 */
class BudgetCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $periods=collect(['TRƯỚC NGÀY CƯỚI 9 - 12 THÁNG',
                        'TRƯỚC NGÀY CƯỚI 6 THÁNG', 
                        'TRƯỚC NGÀY CƯỚI 3 THÁNG',
                        'TRƯỚC NGÀY CƯỚI 2 THÁNG',
                        'TRƯỚC NGÀY CƯỚI 1 THÁNG',
                        'TRƯỚC NGÀY CƯỚI 1 NGÀY',
                        'NGÀY ĐÁM CƯỚI']);
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'period'=> $periods->random(),
            'completed' => fake()->boolean
        ];
    }
}
