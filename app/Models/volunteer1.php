<?php

namespace App\Models;

use App\Models\volunteer_role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class volunteer1 extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function role(){
        return $this->belongsTo(volunteer_role::class);
    }

}
