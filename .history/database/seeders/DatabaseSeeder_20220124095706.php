<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

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
        DB::table('nhanvien')->insert([
            [
                'TenNV' => 'Admin',
                'Email' => 'admin@gmail.com',
                'MatKhau' => bcrypt('1234'),
                'SoDienThoai' => '0987654321',
                'GioiTinh' => '0',
                'Create_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
