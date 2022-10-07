<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Post extends Model
{
  use HasFactory, QueryCacheable;
  protected $cacheFor = 1200;

    protected $fillable = [
        'admin_id',
        'country_id',
        'section_id',
        'title',
        'seo',
        'summary',
        'author',
        'source',
        'postcontent',
        'category',
        'image',
        'reads',

    ];
    public function getRouteKeyName()
     {
         return 'seo'; // db column name you would like to appear in the url.
     }

   public function category() {
      return $this->hasMany(PostCategories::class);
   }

   public function section() {
      return $this->belongsTo(Section::class);
   }

   public function getsection() {
     $section = Section::where('id',$this->section_id)->first();
     return $section;
   }

   public function getcategories() {
     $categories = Category::take(0)->get();
     $categorylist = PostCategories::where('post_id',$this->id)->get();
     foreach ($categorylist as $catli ) {
       $temp1 = Category::where('id',$catli->category_id)->get();;
       foreach ($temp1 as $tempp1) {
         $categories->push($tempp1);
       }
     }

     return $categories;
   }

   public function getmaincategory() {
     $postcategories = PostCategories::where('post_id',$this->id)->first();
     $category = Category::where('id',$postcategories->category_id)->first();
     return $category;
   }

   public function getcountry() {
     $country = Countries::where('id',$this->country_id)->first();
     return $country;
   }

}
