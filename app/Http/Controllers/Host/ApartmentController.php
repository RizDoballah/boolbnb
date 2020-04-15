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
        $apartments = Apartment::where('user_id', Auth::id())->get();

        return view('host.index', compact('apartments'));
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

        return view('host.show', compact('apartment'));
    }


    public function edit($id)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();
        // return view('admin.posts.edit', [
        //     'post' => $post,
        //     'tags' => Tag::all()
        // ]);


        $apartment = Apartment::find($id)->firstOrFail();

        return view('host.edit', compact('apartment'));
    }



    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->all();



        dd('CIAOOOOOOOO');

        if ($apartment->user->id != Auth::user()->id) {
            abort(404);
        }

        // $validatedData = $request->validate($this->data());

        // if (!empty($request->main_img)) {
        //     $path = Storage::disk('public')->put('images', $request->image_path);
        //     $post->update(['main_img' => $path]);
        // }

        $apartment->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'rooms' => $data['rooms'],
            'bathroom' => $data['bathroom'],
            'square_meters' => $data['square_meters']
            // 'updated_at' => Carbon::now()
        ]);
 

        return redirect()->route('host.index', compact('apartment'));
    }




    public function destroy(Apartment $apartment)
    {

    }
}
