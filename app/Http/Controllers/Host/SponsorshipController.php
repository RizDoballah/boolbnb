<?php

namespace App\Http\Controllers\Host;

use App\Apartment;
use App\Sponsorship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    // public function __construct() {
    //     // Prendere l'appartamento 
    //     $apartments = Apartment::whereHas('sponsorships')->get();
    //     // prendere la duration Sponsorship
    //     foreach ($apartments as $apartment) {
    //        $duration = $apartment->sponsorships[0]->duration;
    //        $createdDate = $apartment->created_at;
    //        $now = Carbon::now()->subHours($duration);
    //         if($createdDate >= $now) {
    //             $apartment->sponsorships()->detach();
    //         }
    //     }
    //     // created 19.25 28/04/2020 creato nuovo sponsorship
    //     // now = 19.26 27/04/2020
    // }

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
