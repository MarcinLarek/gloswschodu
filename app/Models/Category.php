<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'category',
        'parent_category_id',
    ];

    //public function getRouteKeyName()
    //{
    //   return 'category'; // db column name you would like to appear in the url.
    //}

    public function section() {
      return $this->belongsTo(Section::class);
    }

    public function posts() {
      return $this->hasMany(PostCategories::class);
    }

    public function getposts() {
      $categorylist = PostCategories::where('category_id', $this->id)->get();
      $subcategory = $this->getsubcategories();
      foreach ($subcategory as $cat) {
        $temp = PostCategories::where('category_id', $cat->id)->get();
        if($temp != null) {
          foreach ($temp as $temp2){
            $categorylist->push($temp2);
          }
        }

      }
      $categorylist = $categorylist->unique();

      $main = Post::take(0)->get();
      foreach ($categorylist as $catli ) {
        $temp1 = Post::where('id',$catli->post_id)->get();
        foreach ($temp1 as $tempp1) {
          $main->push($tempp1);
        }
      }
      $main = $main->unique();

      return $main;
    }

    public function getsection() {
      $section = Section::where('id',$this->section_id)->first();
      return $section;
    }
    public function getsubcategories() {
      $categories = Category::where('parent_category_id', $this->id)->get();
      return $categories;
    }

    public function getparentcategory() {
      $categories = Category::where('id', $this->parent_category_id)->first();
      return $categories;
    }
}
