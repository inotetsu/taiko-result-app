<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    public function songGenre() {
        return $this->hasMany(song::class);
    }
}
