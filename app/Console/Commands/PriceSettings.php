<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currencysetting;

class PriceSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pricesetting:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://v6.exchangerate-api.com/v6/26cb8a9e5935e5167f45f430/latest/INR',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
       $pricelist = json_decode($response);
       foreach($pricelist->conversion_rates as $key => $val){
        Currencysetting::where('currency_sort_code', $key)
            ->update([
                'conversion_rates' => $val
                ]);

       }
       return 0;
    }
}
