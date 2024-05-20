<?php

namespace App\Service;

use App\Actions\PaymentProvider\PingPaymentProviderAction;
use App\Models\PaymentProvider;
use Exception;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    public static string $paymentProvider;

    public static function init()
    {
        (new PingPaymentProviderAction)->execute();

        self::$paymentProvider = PaymentProvider::latest()->first()->provider;
    }

    public static function processPayment(array $parameters)
    {
        try{
            self::init();
        }catch(Exception $ex){
            return null;
        }

        $paymentProvider = self::$paymentProvider;

        try{
           return app("\App\Service\Providers\\$paymentProvider")::processPayment($parameters);
        }catch(Exception $ex){
            $paymentProvider = (string) collect(PaymentProvider::PROVIDER)->except($paymentProvider)->values()->first();
            return app("\App\Service\Providers\\$paymentProvider")::processPayment($parameters);
        }
    }
}
