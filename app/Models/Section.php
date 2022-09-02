<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function getRouteKeyName()
   {
       return 'sectionseo'; // db column name you would like to appear in the url.
   }

    public function category() {
       return $this->hasMany(Category::class);
    }

    public function post() {
       return $this->hasMany(Post::class);
    }

    public function getcategories() {
      $categorylist = Category::where('section_id',$this->id)->get();
       return $categorylist;
    }

    public function getposts() {
      $posts = Post::where('section_id', $this->id)->get();
      return $posts;
    }

    public function menaged()
    {
        return $this->belongsToMany(Admin::class);
    }
}
