<?php

use App\Scheduler\PingPaymentProviderScheduler;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// To ping payment provider every minute.
Schedule::call(fn () => new PingPaymentProviderScheduler())->everyMinute();
