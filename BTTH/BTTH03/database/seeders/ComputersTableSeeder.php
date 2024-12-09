<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('computers')->insert([
            [
                'computer_name' => 'Lab1-PC01',
                'model' => 'Dell Optiplex 7000',
                'operating_system' => 'Windows 10 Pro',
                'processor' => 'Intel Core i5-12400F',
                'memory' => 16,
                'available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'computer_name' => 'Lab1-PC02',
                'model' => 'HP EliteDesk 800',
                'operating_system' => 'Windows 11 Pro',
                'processor' => 'Intel Core i9-14900K',
                'memory' => 64,
                'available' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
