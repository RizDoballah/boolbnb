<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model

{
    protected $fillable = [
      'email',
      'body'
    ];

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }

}
