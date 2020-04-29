<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'duration',
        'price'
    ];

    public $timestamps = false;

    public function apartments()
    {
        return $this->belongsToMany('App\Apartment')->withTimestamps();
    }
}
