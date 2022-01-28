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
                'tennv' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('1234'),
                'sodienthoai' => '0987654321',
                'gioitinh' => '0',
                'create_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
