<?php

namespace App\Actions\PaymentProvider;

use App\Models\PaymentProvider;
use Exception;
use Illuminate\Support\Facades\Log;

class SetPaymentProviderAction
{
    public function execute(string $provider)
    {
        $attributes = ['provider' => $provider];

        try{
            $paymentProvider = PaymentProvider::latest()->first();

            $paymentProvider
                ? $paymentProvider->update($attributes)
                : PaymentProvider::query()->create($attributes);
        }catch(Exception $exception){
            Log::error("Error @ SetPaymentProviderAction - {$exception->getMessage()}");
            throw new Exception("Could not set payment provider - {$exception->getMessage()}");
        }
    }
}
