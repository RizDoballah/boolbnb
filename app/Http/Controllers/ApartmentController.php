<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{

    public function index()
    {
        $apartments = Apartment::take(6)->where('published', '1')->get();

        return view('index', compact('apartments'));
    }


    public function create()
    {

    }


    public function store(Request $request)

    {


    }


    public function show($id)
    {
        $apartment = Apartment::find($id);
        if($apartment->published == 0){
          abort('404');
        }

        abort_if(empty($apartment), 404);

        return view('show', compact('apartment'));
    }


    public function edit(Apartment $apartment)
    {

    }


    public function update(Request $request, Apartment $apartment)
    {

    }


    public function destroy(Apartment $apartment)
    {

    }
}
