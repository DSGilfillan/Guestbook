<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    /*
    _ Ignore flagged signatures.
    _
    _ @param $query
    _ @return mixed 
    */
    public function scopeIgnoreFlagged($query)
    {
        return $query->where('flagged_at', null);
    }
}
