<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class difficulty extends Model
{
    public function songDifficulty() {
        return $this->hasMany(song::class);
    }
}
