<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book_category;
class Book extends Model
{
    public function category(){
    	return $this->belongsTo('App\Book_category', 'bookcat_id');
    }
    public function borrowers(){
    	return $this->belongToMany('App\Borrower');
    }
    
}
