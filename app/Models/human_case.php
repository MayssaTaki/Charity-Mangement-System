<?php

namespace App\Models;
use App\Models\donor_humen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class human_case extends Model
{
    use HasFactory;

    
    protected $guarded =[];

    public function donor_humen(){
        return $this->hasMany(donor_humen::class);
    }
}
