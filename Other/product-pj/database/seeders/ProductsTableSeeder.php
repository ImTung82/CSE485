<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('products')->insert([
                'product_name' => $faker->words(3, true), // Tên sản phẩm ngẫu nhiên
                'description' => $faker->sentence(10),  // Mô tả ngẫu nhiên
                'price' => $faker->randomFloat(2, 10, 1000), // Giá từ 10 đến 1000
                'category_name' => $faker->word, // Danh mục ngẫu nhiên
                'image' => $faker->imageUrl(640, 480, 'products', true, 'Faker'), // Đường dẫn ảnh giả
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
