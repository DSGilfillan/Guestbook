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

    /*
    _ Get the user Gravatar by their email address.
    _ 
    _ @return string */
    public function getAvatarAttribute()
    {
        return sprintf('https://www.gravatar.com/avatar/%s?s=100', md5($this->email));

    }
}
