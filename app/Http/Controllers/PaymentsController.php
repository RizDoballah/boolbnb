<?php

namespace App\Http\Controllers;
use App\Payments;
use Braintree\Transaction;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function make() {
        return view('welcome');
    }

    public function process(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = \Braintree\Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
    }

}
