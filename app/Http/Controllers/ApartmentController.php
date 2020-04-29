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

    public function index()
    {

        $apartments = new Apartment;
        
            $apartments = $apartments->where('published', '1');
            
            $apartments->whereHas('sponsorships', function ($query) {
                $query->where("expires_at", ">", Carbon::now());
            })->take(4);

            $apartmentsPlus = $apartments->get();

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
