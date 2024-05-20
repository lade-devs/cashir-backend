<?php

namespace App\Actions\PaymentProvider;

use App\Models\PaymentProvider;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PingPaymentProviderAction
{
    public function execute(int $tries = 0)
    {
        $currentProvider = PaymentProvider::latest()->first();

        if ( $tries == config('env.tries') ){
            Log::error('All payment providers are down.');
            throw new Exception("All payment providers are down.");
        }

        $pingUrl = config("env.{$currentProvider->provider}_ping_url");

        try{
            $ping = Http::timeout(config('env.timeout'))->get($pingUrl);
        }catch(Exception $ex){
            $tries = $tries + 1;

            $this->switchProvider($currentProvider, $tries);

            return $this->execute($tries);
        }

        if ( $ping->status() != 200 ){
            $tries = $tries + 1;

            $this->switchProvider($currentProvider, $tries);

            return $this->execute($tries);
        }

        return true;
    }

    private function switchProvider(PaymentProvider $currentProvider, int $tries)
    {
        $paymentProvider = (string) collect(PaymentProvider::PROVIDER)->except($currentProvider->provider)->values()->first();

        Log::info("Switching provider to $paymentProvider | tries: $tries");

        (new SetPaymentProviderAction)->execute($paymentProvider);
    }
}
