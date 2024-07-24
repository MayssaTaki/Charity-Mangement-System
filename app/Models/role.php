<?php

namespace App\Models;

use App\Models\volunteer1;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class role extends Model
{
    use HasFactory;
    protected $guarded =[];


    public function volunteer1(){
        return $this->hasMany(volunteer1::class);
    }
}
