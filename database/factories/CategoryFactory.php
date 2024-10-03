<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Product;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'parent_id' => '0', // Chọn ngẫu nhiên một brand_id từ bảng brands
            'category_name' => $this->faker->word, // Chọn ngẫu nhiên một category_id từ bảng categories
            'category_desc' => $this->faker->sentence,
            'category_status' => '1',
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
