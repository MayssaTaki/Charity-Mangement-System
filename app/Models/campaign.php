<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class campaign extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function poor_family()
    {
        return $this->hasMany(poor_family::class);
    }

 

    public function send_campaign()
    {
        return $this->hasMany(send_campaign::class);
    }

    public function cach_payment()
    {
        return $this->hasMany(Cach_payment::class);
    }

    public function donor_campaign()
    {
        return $this->hasMany(donor_campaign::class);
    }
}
