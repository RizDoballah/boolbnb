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
        "dist",
        "city",
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

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function sponsorships()
    {
        return $this->belongsToMany('App\Sponsorship')->withtimestamps();
    }


}
