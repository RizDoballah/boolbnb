<?php

namespace App\Http\Controllers;
use App\Payments;
use App\Sponsorship;
use Braintree\Transaction;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function make(Request $request) {


      $price = $request->price;
      $sponsorship = new Sponsorship;

      $sponsorship = $sponsorship->where('price', $price)->first();

      $data = [
        'price'=>$price,
        'duration'=>$sponsorship->duration
      ];
    
        return view('host.sponsorships.checkout', $data);
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
