<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder; // Gọi seeder cho bảng products
use Database\Seeders\CategorySeeder; // Gọi seeder cho bảng categories
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProductSeeder::class);
        //$this->call(CategorySeeder::class);
    }
}
