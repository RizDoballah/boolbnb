<?php

namespace App\Http\Controllers\Host;

use App\Apartment;
use App\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    public function index() {

    $sponsorships = [];
    $apartments = new Apartment;
    $apartments = $apartments->where('user_id', Auth::id())->get();

    // dd($apartments);

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
}
