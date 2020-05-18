<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public function metable()
    {
        return $this->morphTo();
    }
}
