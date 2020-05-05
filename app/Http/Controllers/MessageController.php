<?php

namespace App\Http\Controllers;
use Validator;
use App\Message;
use App\Apartment;
use App\User;
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
      $messages = [];
      $apartments = new Apartment;
      $apartments = $apartments->where('user_id', Auth::id())->get();
      foreach ($apartments as $apartment) {
        $messages[] = Message::where('apartment_id', $apartment->id)->latest()->get();
      }

        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'body' => 'required|string',
            'email' => 'required|email'
            ]);


     if ($validator->fails()) {
        return response()->json([
        'errors' => $validator->messages(),
        'sent' => false
        ]);
     }

        $newMessage = Message::create([
            'name' => $data['name'],
            'body' => $data['body'],
            'email' =>$data['email'],
            'apartment_id' => $data['apartment_id']
        ]);

        // dd($newMessage);

        return response()->json([
            'errors' => false,
            'sent' => true]);
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
