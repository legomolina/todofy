<?php

namespace todofy\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function user()
    {
        return $this->belongsTo('todofy\User');
    }
}
