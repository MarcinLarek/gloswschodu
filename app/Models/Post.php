<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'country_id',
        'title',
        'author',
        'source',
        'postcontent',
        'category',
        'image',
        'reads',

    ];
  //  Ta funkcja sprawia że posty są wyszukiwane po pytułach. Niestety przy dłuższych tytułach
  // strona wywala błąd. Obecnie zamienione spowrotem na ID
  //  public function getRouteKeyName()
  // {
  //     return 'title'; // db column name you would like to appear in the url.
  // }

   public function category() {
      return $this->hasMany(PostCategories::class);
   }

   public function section() {
      return $this->belongsTo(Section::class);
   }

   public function getsection() {
     $postcategories = PostCategories::where('post_id',$this->id)->first();
     $categories = Category::where('id',$postcategories->category_id)->first();
     $section = Section::where('id',$categories->section_id)->first();
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
