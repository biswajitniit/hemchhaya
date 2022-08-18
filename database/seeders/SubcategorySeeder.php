<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            'category_id'          => '1',
            'sub_category_name'    => 'Ghee',
            'sub_category_sort_no' => '1',
            'menu_dropdown'        => '1',
            'menu_show_sub_item'   => '1',
            'menu_show_div'        => '1',
            'status'               => '1',
        ]);
    }
}
