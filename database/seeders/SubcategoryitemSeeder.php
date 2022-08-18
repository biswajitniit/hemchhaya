<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubcategoryitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategoryitems')->insert([
            'category_id'               => '1',
            'sub_category_id'           => '1',
            'sub_category_item_name'    => 'Tea Bags',
            'status'                    => '1',
        ]);
    }
}
