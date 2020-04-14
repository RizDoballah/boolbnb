<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Apartment extends Model
{
    protected $fillable = [

        "user_id",
        "title",
        "description",
        "rooms",
        "bathroom",
        "square_meters",
        "lat",
        "lon",
        "main_img"

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}


