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
    public function __construct() {

        $apartments = Apartment::whereHas('sponsorships')->get();
        foreach ($apartments as $apartment) {

           $duration = $apartment->sponsorships[0]->duration;
           $createdAt = $apartment->sponsorships[0]->pivot->created_at;
           $expiring_date = $createdAt->addHours($duration);
           $now = Carbon::now();

            if($now > $expiring_date) {
                $apartment->sponsorships()->detach();
            }
        }
    }

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

        $result = $apartment->sponsorships()->attach($sponsorship);

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
