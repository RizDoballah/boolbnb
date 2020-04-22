<?php

namespace App\Http\Controllers;

use App\Message;
use App\Apartment;
use App\User;
// use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $apartments = new Apartment;
      $apartments = $apartments->where('user_id', Auth::id())->get();

        return view('messages.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        // $validateData = $request->validate([
        //     'name' => 'required|string',
        //     'body' => 'required|string',
        //     'email' => 'required|email'
        // ]);
        
        // $newMessage = Message::create([
        //     'name' => $data['name'],
        //     'body' => $data['body'],
        //     'email' =>$data['email'],
        //     'apartment_id' => $data['apartment_id']
        // ]);
        $newMessage = new Message;
        $newMessage->fill($data);
       
        // $newMessage->name = Input::get('name');
        $save = $newMessage->save();

        // if ($validateData->fails()) {    
        //     return response()->json($validateData->messages(), 200);
        // }
        return response()->json($newMessage);

        // "SQLSTATE[HY000]: General error: 1364 Field 'apartment_id' doesn't have a default value (SQL: insert into `messages` (`name`, `email`, `body`, `updated_at`, `created_at`) values (sss, sss, ss, 2020-04-22 10:02:54, 2020-04-22 10:02:54))"


        // return response()->json($data);
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
