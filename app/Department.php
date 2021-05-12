<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function borrowers()
    {
        return $this->belongsTo('App\Borrower');
                    
    }
}
