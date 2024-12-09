<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hardware_devices')->insert([
            [
                'device_name' => 'Logitech G502',
                'type' => 'Mouse',
                'status' => true,
                'center_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_name' => 'Razer BlackWidow',
                'type' => 'Keyboard',
                'status' => false,
                'center_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
