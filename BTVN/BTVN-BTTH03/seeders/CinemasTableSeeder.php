<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cinemas')->insert([
            [
                'name' => 'CGV Vincom',
                'location' => 'Vincom Center, Hà Nội',
                'total_seats' => 1500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lotte Cinema Đống Đa',
                'location' => '123 Đường Đ, Hà Nội',
                'total_seats' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
