<?php

namespace App\Http\Controllers\Host;

use App\Apartment;
use Carbon\Carbon;
use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SponsorshipController extends Controller
{

    public function index() {


    $apartments = new Apartment;
    $apartments = $apartments->where('user_id', Auth::id())->get();
    
      return view('host.sponsorships.index', compact('apartments'));

    }

    public function store(Request $request, $price, $apartmentId) {

        $data = [
            'price' => $price,
            'apartmentId' => $apartmentId
        ];

        $apartment = Apartment::find($apartmentId);
        $sponsorship = Sponsorship::where('price', $price)->first();
        $duration = $sponsorship->duration;
        $expiringDate = Carbon::now()->addHours($duration);

        $result = $apartment->sponsorships()->attach($sponsorship, ['expires_at' => $expiringDate]);

        // $apartment->sponsorship->pivot->update([
        //     'expires_at' = carbon(now) + tempo
            
        // ]);


        return response()->json($result);

    }

    // public function test() {
    //     $sponsor = new Sponsorship;
    //     dd($sponsor);
    //     $new = $sponsor->where('created_at', '>=', Carbon::now()->subMinutes(1)->toDateTimeString());
    //     dd($new);
    //     return view('test');


    // }
}
