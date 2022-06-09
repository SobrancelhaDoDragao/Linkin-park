<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faixa extends Model
{
    use HasFactory;

    protected $table = "faixa";

    public function album(){
        return $this->belongsTo('App\Models\Album');
    }
    
}
