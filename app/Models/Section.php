<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function getRouteKeyName()
   {
       return 'section'; // db column name you would like to appear in the url.
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
      $categorylist = Category::where('section_id',$this->id)->get();
      $filteredcategories = PostCategories::take(0)->get();
      foreach ($categorylist as $catli ) {
        $temp1 = PostCategories::where('category_id',$catli->id)->get();;
        foreach ($temp1 as $tempp1) {
          $filteredcategories->push($tempp1);
        }
      }
      $posttoshow = Post::take(0)->get();
      foreach ($filteredcategories as $filtcat) {
        $temp = Post::where('id', $filtcat->post_id)->get();
        foreach ($temp as $tempp) {
          $posttoshow->push($tempp);
        }
      }
      $posts = $posttoshow->unique();
      return $posts;
    }

    public function menaged()
    {
        return $this->belongsToMany(Admin::class);
    }
}
