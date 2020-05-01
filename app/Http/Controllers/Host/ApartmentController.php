<?php

namespace App\Http\Controllers\Host;

use App\User;
use App\Apartment;
use App\Service;
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

        return view('host.apartments.index', compact('apartments'));
    }


    public function create()
    {
        $services = Service::all();

        return view('host.apartments.create', compact('services'));
    }


    public function store(Request $request)

    {
        $data = $request->all();

        // VALIDAZIONE
        $validatedData = $request->validate([
                'title'=> 'required',
                'description'=> 'required|string',
                'address'=> 'required|string',
                'lat'=> 'required|numeric',
                'lon'=> 'required|numeric',
                'city'=> 'required',
                'main_img'=>'required|image',
                'square_meters'=>'required|numeric',
                'rooms'=>'required|numeric|min:1',
                'bathroom'=>'required|numeric',
                'beds'=>'required|numeric',
                'published'=>'required|boolean',
                'user_id'=>'exists:users,id'
            ]);

        $path = Storage::disk('public')->put('images', $request->main_img);

        $apartment = new Apartment;
        $apartment->fill($validatedData);
        $apartment->user_id = Auth::id();
        $apartment->main_img = $path;
        $saved = $apartment->save();

        abort_if(!$saved, 404);

        if (!empty($data['services'])) {
            $services= $data['services'];
            $apartment->services()->attach($services);
        }

        return redirect(route('home.show', $apartment));
    }


    public function show($id)
    {
        $apartment = Apartment::find($id);

        abort_if(empty($apartment), 404);

        return view('show', compact('apartment'));
    }



    public function edit($id)
    {
        $apartment = Apartment::find($id);
        $services = Service::all();

        if($apartment->user_id != Auth::user()->id){
            abort(404);
        }

        abort_if(empty($apartment), 404);

        return view('host.apartments.edit', [
            'services' => $services,
            'apartment' => $apartment
        ]);
    }



    public function update(Request $request, $id)
    {
        $apartment = Apartment::find($id);

        if($apartment->user_id != Auth::user()->id){
           abort(404);
        }
        // VALIDAZIONE
        $validatedData = $request->validate([
            'title'=> 'required',
            'description'=> 'required|string',
            'lat'=> 'required|numeric',
            'lon'=> 'required|numeric',
            'city'=> 'required',
            'main_img'=>'image',
            'square_meters'=>'required|numeric',
            'rooms'=>'required|numeric',
            'bathroom'=>'required|numeric',
            'user_id'=>'exists:users,id',
            'address'=> 'required|string',
            'beds'=>'required|numeric',
            'published'=>'required|boolean'
         ]);


    $data = $request->all();


    if(!empty($data['main_img'])) {
        $data['main_img'] = Storage::disk('public')->put('images', $data['main_img']);
       }

    $updated = $apartment->update($data);

        if(!empty($data['services'])){
            $apartment->services()->sync($data['services']);
        }

        if ($updated) {
            return redirect()->route('home.show', $apartment);
        } else {
            abort(404);
        }

    }

    public function destroy($id)
    {
        $apartment = Apartment::find($id);

        abort_if(empty($apartment), 404);

        $apartment->delete();

        return redirect()->route('host.index')->with('delete', " You deleted the post with id: $apartment->id");
    }
}
