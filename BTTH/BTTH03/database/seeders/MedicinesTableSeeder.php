<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol',
                'brand' => 'ABC Pharma',
                'dosage' => '500mg tablets',
                'form' => 'Viên nén',
                'price' => 5.00,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vitamin C',
                'brand' => 'Health Plus',
                'dosage' => '100mg tablets',
                'form' => 'Viên nén',
                'price' => 2.50,
                'stock' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
