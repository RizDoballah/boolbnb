<?php

namespace App\Http\Controllers;

use App\User;
use App\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Host\SponsorshipController;

class ApartmentController extends Controller
{   
    public function __construct()
    {
        //Calling construct from SponsorshipController
        $result = (new SponsorshipController)->__construct();
    }

    public function index()
    {
        $apartmentsPlus = Apartment::take(4)->where('published', '1')->whereHas('sponsorships')->get();
        $apartments = Apartment::take(4)->where('published', '1')->whereDoesntHave('sponsorships')->get();

        return view('index', compact('apartments', 'apartmentsPlus'));
    }


    public function show($id)
    {

        $apartment = Apartment::find($id);
        abort_if(empty($apartment), 404);

        if($apartment->user_id != Auth::id() && $apartment->published == 0) {
            abort('404');
        }



        return view('show', compact('apartment'));
    }



}
