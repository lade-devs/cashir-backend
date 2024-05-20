<?php

namespace App\Service\Providers;

use Digikraaft\Paystack\Charge;
use Digikraaft\Paystack\Paystack;

class PayStackService extends Charge
{
    public static function processPayment(array $parameters)
    {
        //Paystack::setApiKey(config('env.paystack_api_key'));

        //$request = Charge::create($parameters);

        /**Benchmark
         * Depending on the want payment logic required.
         */

         return 'Paystack';
    }
}
