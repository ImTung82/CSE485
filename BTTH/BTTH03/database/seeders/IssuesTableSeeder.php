<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('issues')->insert([
            [
                'computer_id' => 1,
                'reported_by' => 'Admin',
                'reported_date' => now(),
                'description' => 'Máy tính không khởi động được.',
                'urgency' => 'High',
                'status' => 'Open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'computer_id' => 2,
                'reported_by' => 'Admin',
                'reported_date' => now(),
                'description' => 'Có vấn đề về bộ vi xử lý.',
                'urgency' => 'Medium',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
