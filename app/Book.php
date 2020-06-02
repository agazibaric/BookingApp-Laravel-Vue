<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function user() {
        $this->belongsTo(User::class);
    }
}
