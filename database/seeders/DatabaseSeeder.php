<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

        $products = [
            'tomatoes', 'chicken', 'beans', 'eggs', 'pasta', 'meat', 'potato'
        ];

        foreach ($products as $product) {
            
            \App\Models\ShoppingList::create([
                'name' => $product,
            ]);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
