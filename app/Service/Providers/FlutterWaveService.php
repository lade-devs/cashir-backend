<?php

namespace App\Service\Providers;

use Digikraaft\Flutterwave\Charge;
use Digikraaft\Flutterwave\Flutterwave;

class FlutterWaveService extends Charge
{
    public static function processPayment(array $parameters)
    {
        //Flutterwave::setApiKey(config('env.flutterwave_api_key'));


        //$request = Charge::create($parameters);

        /**Benchmark
         * Depending on the want payment logic required.
         */

         return 'Fluttterwave';
    }
}
