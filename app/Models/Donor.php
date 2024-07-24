<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function human_case(){
        return $this->belongsTo(human_case::class);
    }

    public function getstatusAttribute($value)
    {
    return   $value==true ? 'accepted'   : 'panding';
    }
}
