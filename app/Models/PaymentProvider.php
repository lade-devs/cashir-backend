<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProvider extends Model
{
    use HasFactory;

    const PROVIDER = [
        'PayStackService' => 'PayStackService',
        'FlutterWaveService' => 'FlutterWaveService',
    ];

    protected $guarded = [];
}
