<?php

namespace App\Http\Controllers\Host;

use App\User;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
     

    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::id())->get();

        return view('host.index', compact('apartments'));
    }


    public function create()
    {
        return view('host.create');
    }


    public function store(Request $request)

    {
        $validatedData = $request->validate([
            'title'=> 'required',
            'description'=> 'required|string',
            'lat'=> 'nullable|numeric',
            'lon'=> 'nullable|numeric',
            'main_img'=>'required|image',
            'square_meters'=>'required|numeric',
            'rooms'=>'required|numeric',
            'bathroom'=>'required|numeric',
            'user_id'=>'exists:users,id'
            ]);
             
        // $request->validate($this->validateData);

        $data = $request->all();

        // dd($data);

        // dd($validatedData);

        $path = Storage::disk('public')->put('images', $request->main_img);

        $newApartment = Apartment::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'description' => $data['description'],
            'rooms' => $data['rooms'],
            'bathroom' => $data['bathroom'],
            'square_meters' => $data['square_meters'],
            'main_img' => $path
        ]);
        
        return redirect(route('host.show', $newApartment));
    }


    public function show($id)
    {
        $apartment = Apartment::find($id);

        abort_if(empty($apartment), 404);

        return view('host.show', compact('apartment'));
    }


    public function edit($id)
    {
        $apartment = Apartment::find($id);

        return view('host.edit', compact('apartment'));
    }



    public function update(Request $request, $id)
    {
        $apartment = Apartment::find($id);

        $validatedData = $request->validate([
            'title'=> 'required',
            'description'=> 'required|string',
            'lat'=> 'nullable|numeric',
            'lon'=> 'nullable|numeric',
            'main_img'=>'image',
            'square_meters'=>'required|numeric',
            'rooms'=>'required|numeric',
            'bathroom'=>'required|numeric',
            'user_id'=>'exists:users,id'
         ]);
         

    $data = $request->all();
    
    if(!empty($data['main_img'])) {
        $data['main_img'] = Storage::disk('public')->put('images', $data['main_img']);
       }
    // $data['main_img'] = Storage::disk('public')->put('images', $request->main_img);

    // dd($updated);

            // dd($data);
        // dd($apartment);
            
    //  $apartment->update([
    //      'title' => $data['title'],
    //     //  'description' => $data['description'],
    //     //  'rooms' => $data['rooms'],
    //     //  'bathroom' => $data['bathroom'],
    //     //  'square_meters' => $data['square_meters'],
    //     //  'main_img' => $path
    //  ]);

    $updated = $apartment->update($data);
        
        if ($updated) {
            return redirect()->route('host.show', $apartment);
        } else {
            abort(404);
        }

    }




    public function destroy(Apartment $apartment)
    {

    }
}
