<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BudgetCategory;
use App\Models\BudgetItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user){
            BudgetCategory::factory()->count(5)->for($user)->create()->each(function ($budgetCategory){
                $numberItems = random_int(2,5);
    
                BudgetItem::factory()->count($numberItems)->for($budgetCategory)->create();
            }); 
        });
         
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
