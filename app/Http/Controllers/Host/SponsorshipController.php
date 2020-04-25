<?php

namespace App\Http\Controllers\Host;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    public function index() {
        
    $sponsorships = [];
    $apartments = new Apartment;
    $apartments = $apartments->where('user_id', Auth::id())->get();

    dd($apartments);

        return view('host.sponsorships.index', compact('apartments'));

    }
}
