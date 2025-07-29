<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    protected $fillable = ['good_count','ok_count','miss_count','roll_count','full_combo','donda_full_combo','play_count','comment'];

    public function songResult() {
        return $this->belongsTo(song::class);
    }
}
