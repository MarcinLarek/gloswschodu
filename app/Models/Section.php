<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Section extends Model
{
    use HasFactory;
    use QueryCacheable;
    protected $cacheFor = 1200;

    public function getRouteKeyName()
    {
        return 'sectionseo'; // db column name you would like to appear in the url.
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function getcategories()
    {
        $categorylist = Category::where('section_id', $this->id)->get();
        return $categorylist;
    }

    public function getposts()
    {
        $posts = Post::where('section_id', $this->id)->get();
        return $posts;
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function menaged()
    {
        return $this->belongsToMany(Admin::class);
    }


}
