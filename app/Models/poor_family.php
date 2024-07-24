<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poor_family extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function area()
    {
        return $this->belongsTo(area::class);
    }

    public function campaign()
    {
        return $this->belongsTo(campaign::class);
    }
}
