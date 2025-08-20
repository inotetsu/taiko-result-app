<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    protected $fillable = ['title','user_id','difficulty_id','genre_id'];

    public function difficulty(){
        return $this->belongsTo(difficulty::class);
    }

    public function genre(){
        return $this->belongsTo(genre::class);
    }

    public function result(){
        return $this->hasMany(result::class);
    }

    // カスケード削除
    protected static function booted(){
        static::deleting(function($song){
            $song->result()->delete();
        });
    }
}
