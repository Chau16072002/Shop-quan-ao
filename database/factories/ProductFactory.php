<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => Brand::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một brand_id từ bảng brands
            'category_id' => Category::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một category_id từ bảng categories
            'product_name' => $this->faker->word,
            'product_desc' => $this->faker->sentence,
            'product_content' => $this->faker->paragraph,
            'product_price' => $this->faker->numberBetween(100000, 1000000),
            'product_image' => 'image' . $this->faker->numberBetween(1, 5) . '.jpg',
            'product_status' => $this->faker->randomElement(['1', '0']),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}