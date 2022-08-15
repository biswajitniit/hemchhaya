<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert([
            'category_name'       => 'Grocery',
            'category_sort_no'    => '1',
            'menu_dropdown'       => '1',
            'menu_show_div_type'  => '1',
            'menu_show_in_header' => '1',
            'status'              => '1',
        ]);
    }
}
