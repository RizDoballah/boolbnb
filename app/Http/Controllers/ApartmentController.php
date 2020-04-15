<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    private function __construct()
    {
        $this->validation = [
            'title'=> 'required',
            'description'=> 'required|string|max:1000',
            'lat'=> 'numeric',
            'lon'=> 'numeric',
            'main_img'=>'required|image',
            'square_meters'=>'required|numeric|min:40|max:500',
            'rooms'=>'required|numeric|min:1|max:10',
            'bathrooms'=>'required|numeric|min:1|max:3',
            'user_id'=>'exists:users,id',
        ];
    }

    public function index()
    {
        $apartments = Apartment::take(6)->get();
        return view('guest.index', compact('apartments'));
    }


    public function create()
    {
        return view('host.create');
    }


    public function store(Request $request)
    {
        
    }


    public function show($id)
    {   
        $apartment = Apartment::find($id);

        abort_if(empty($apartment), 404);

        return view('guest.show', compact('apartment'));
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
