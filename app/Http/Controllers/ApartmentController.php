<?php

namespace App\Http\Controllers;

use App\User;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{   
       //    $duration = $apartment->sponsorships[0]->duration;
        //    $expiring_date = $createdAt->addHours($duration);

    public function index()
    {

        $apartments = new Apartment;
        
            $apartments = $apartments->where('published', '1');
            $apartments = $apartments->whereHas('sponsorships');
            $apartments = $apartments->get();

            foreach ($apartments as $apartment) {

                foreach ($apartment->sponsorships as $sponsorship) {
                    
                    $expiring_date = $sponsorship->pivot->created_at->addHours($sponsorship->duration);
                    $now = Carbon::now();

                    $active = false;
                    if($now < $expiring_date) {
                        $active = true;
                        // dd($active);
                    }
                }
                if($active == false) {
                    $apartments->forget($apartment->id);
                }
            }

            $apartmentsPlus = $apartments;
            // dd($apartmentsPlus);



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
