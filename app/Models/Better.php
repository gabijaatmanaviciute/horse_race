<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Better extends Model
{
    use HasFactory;
    public function bettedHorse()
    {
        return $this->belongsTo('App\Models\Horse', 'horse_id', 'id');
    }

}
