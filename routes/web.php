<?php

use App\Http\Controllers\PaymentsController;
use App\Service\PaymentService;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaymentsController::class, 'store']);
