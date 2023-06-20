<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyseeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencysettings')->insert([
            'base_code'               => 'INR',
            'currency_code'           => 'INR',
            'conversion_rates'        => '1'
        ]);
    }
}
