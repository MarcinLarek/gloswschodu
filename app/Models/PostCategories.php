<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class PostCategories extends Model
{
  use HasFactory, QueryCacheable;
  protected $cacheFor = 1200;

    protected $fillable = [
        'post_id',
        'category_id',

    ];

    public function post() {
      return $this->belongsTo(Post::class);
    }

    public function category() {
      return $this->belongsTo(Category::class);
    }
}
