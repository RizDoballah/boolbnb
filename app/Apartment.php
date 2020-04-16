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
        "beds",
        "bathroom",
        "square_meters",
        "lat",
        "lon",
        "address",
        "main_img",
        "published"
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

}
