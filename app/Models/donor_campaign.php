<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donor_campaign extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function campaign(){
        return $this->belongsTo(campaign::class);
    }

    public function getstatusAttribute($value)
    {
    return   $value==true ? 'accepted'   : 'panding';
    }
    
}
