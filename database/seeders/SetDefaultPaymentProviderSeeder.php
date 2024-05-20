<?php

namespace Database\Seeders;

use App\Actions\PaymentProvider\SetPaymentProviderAction;
use App\Models\PaymentProvider;
use App\Service\PaymentService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetDefaultPaymentProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new SetPaymentProviderAction)->execute(PaymentProvider::PROVIDER['FlutterWaveService']);
    }
}
