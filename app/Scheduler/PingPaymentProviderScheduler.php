<?php

namespace App\Scheduler;
use App\Actions\PaymentProvider\PingPaymentProviderAction;

class PingPaymentProviderScheduler
{
    public function __invoke()
    {
        (new PingPaymentProviderAction)->execute();
    }
}
