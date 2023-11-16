<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)->create()->each(function($user){
        //     \App\Models\Task::factory()->count(5)->for($user)->create();
        // });
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Task::factory()->create([
            'user_id' => 2,
            'title'=> 'tesst title2',   
            'period'=> 'TRƯỚC NGÀY CƯỚI 6 THÁNG',
            'completed' => true,
        ]);
    }
}
