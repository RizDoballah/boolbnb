<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    public function __construct()
    {
        $this->validateRules = [
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
      $request->validate($this->validateRules);


      $data = $request->all();
      dd($data);

       $path = Storage::disk('public')->put('images', $data['main_img'] );

      $apartment = Apartment::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'description' => $data['description'],
            'main_img' => $path,
            'square_meters'=>$data['square_meters'],
            'rooms'=>$data['rooms'],
            'bathroom'=>$data['bathroom']

        ]);

        return redirect()->route('host.show', $apartment->id);


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
