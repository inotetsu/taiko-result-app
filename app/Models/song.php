<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    protected $fillable = ['title','difficulty_id','genre_id'];

    public function difficulty(){
        return $this->belongsTo(difficulty::class);
    }

    public function genre(){
        return $this->belongsTo(genre::class);
    }
}
