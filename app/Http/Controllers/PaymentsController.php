<?php

namespace App\Http\Controllers;

use App\Service\PaymentService;
use Illuminate\Http\Request;

class PaymentsController
{
    public function store(Request $request)
    {
        $initPayment = PaymentService::processPayment($request->input());

        return response()->json([
            'status' => $initPayment
        ]);
    }
}

