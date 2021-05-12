<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
class Book_category extends Model
{
   public function book(){
   	return $this->hasMany('App\Book');
   }
}
