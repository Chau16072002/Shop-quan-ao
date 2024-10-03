<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = Category::factory()
        ->has(
            Product::factory()
                    ->count(2)
                    ->state(function (array $attributes, Category $category) {
                        return ['category_id' => $category->id];
                    })
                )
        ->count(2)
        ->create();
    }
}
