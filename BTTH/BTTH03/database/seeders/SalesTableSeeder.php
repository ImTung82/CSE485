<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'medicine_id' => 1,
                'quantity' => 2,
                'sale_date' => now(),
                'customer_phone' => '0132084394',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => 2,
                'quantity' => 1,
                'sale_date' => now(),
                'customer_phone' => '0948576109',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
