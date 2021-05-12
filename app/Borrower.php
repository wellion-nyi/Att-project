<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Department;
class Borrower extends Model
{
   
    public function department()
    {
        return $this->belongsTo('App\Department','dep_id');
                    
    }
     public function books()
    {
        return $this->belongsToMany('App\Book');            
    }
}
