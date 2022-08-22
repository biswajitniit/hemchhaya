<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            'name'               => 'vendor',
            'email'              => 'vendor@gmail.com',
            'password'           => '$2y$10$9c4/3snzvsSVT.IuMbddLe0IoCf2JCt8kXCpxh..DwPcqnNNmqjLW',
            'is_super'           => '0',
            'remember_token'     => 'nZSz8mqVzR4CeCpal6vzw0lnqOO1sYvMayKgItHI7e9RfavsBAs2PcWvUtDb'
        ]);
    }
}
