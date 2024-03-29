<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    public function getRouteKeyName()
   {
       return 'country'; // db column name you would like to appear in the url.
   }

    public function getposts() {
      $posts = Post::where('country_id',$this->id)->get();
      return $posts;
    }
}
