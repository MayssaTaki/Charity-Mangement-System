<?php

namespace App\Models;

use App\Models\campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cach_payment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function campaign()
    {
        return $this->belongsTo(campaign::class);
    }
}
