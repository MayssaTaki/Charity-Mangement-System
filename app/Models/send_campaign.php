<?php

namespace App\Models;

use App\Models\area;
use App\Models\campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class send_campaign extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function area(){
        return $this->belongsTo(area::class);
        
    }
    public function campaign(){
        return $this->belongsTo(campaign::class);
    }
}
