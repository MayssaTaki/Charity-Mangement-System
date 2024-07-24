<?php

namespace App\Models;

use App\Models\campaign;
use App\Models\send_campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class area extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function poor_family(){
        return $this->hasMany(poor_family::class);
    }

    public function campaign(){
        return $this->hasMany(campaign::class);
    }

    public function send_campaign(){
        return $this->hasMany(send_campaign::class);
    }



   


}
