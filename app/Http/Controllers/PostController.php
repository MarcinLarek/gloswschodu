<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Category;
use App\Models\PostCategories;
use App\Models\Countries;

class PostController extends Controller
{

  public function index(Section $section)
  {

      $posts = $section->getposts()->sortDesc();

      $categorylist = Category::where('section_id',$section->id)
                               ->where('parent_category_id',null)
                               ->get();
      $firstpost = $posts->sortDesc()->first();
      if ($section->id == 1) {
        $posts = $posts->sortDesc()->slice(1)->take(37);
      }
      else {
        $posts = $posts->sortDesc()->slice(1)->take(28);
      }
      $sections = Section::get();
      $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
      $countries = Countries::get();
      return view($cleansection.'.index')
       ->with('firstpost', $firstpost)
       ->with('posts', $posts)
       ->with('categories', $categorylist)
       ->with('countries', $countries)
       ->with('serachsection', $section)
       ->with('section', $cleansection)
       ->with('sections', $sections);
  }

  public function show(Section $section, Post $post)
  {

    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $post->reads++;
    $post->update();
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $admin = Admin::where('id',$post->admin_id)->first();
    $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
    $countries = Countries::get();
    return view('plportal.show')
    ->with('post', $post)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('countries', $countries)
    ->with('section', $cleansection)
    ->with('serachsection', $section)
    ->with('sections', $sections)
    ->with('admin', $admin)
    ->with('categories', $categorylist);
  }

  public function category(Section $section, Category $category)
  {
    $main = $category->getposts()->sortDesc()->paginate( 20 );
    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
    $countries = Countries::get();
    return view('plportal.category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $cleansection)
    ->with('serachsection', $section)
    ->with('countries', $countries)
    ->with('sections', $sections)
    ->with('topcategory', $category->category)
    ->with('categories', $categorylist);
  }

  public function search(Section $section, Request $request)
  {
    $search = $request['serach'];
    if ($search == null) {
        $search = "null";
    }
    return redirect()->route('get.serach', ['section' => $section, 'search' => $search]);
  }

  public function getsearch(Section $section, $search)
  {
    if ($search == "null") {
        $search = null;
    }
    $main = Post::where('title','like', '%'.$search.'%')
                              ->orwhere('postcontent','like', '%'.$search.'%')
                              ->orderBy('id', 'DESC')
                              ->get();
    $loop = 0;
    foreach ($main as $temp) {
      if ($temp->getsection()->id != $section->id) {
        $main->forget($loop);
      }
      $loop++;
    }

    $main = $main->paginate( 20 );
    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
    $countries = Countries::get();
    return view('plportal.category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $cleansection)
    ->with('countries', $countries)
    ->with('serachsection', $section)
    ->with('sections', $sections)
    ->with('search', $search)
    ->with('categories', $categorylist);
  }

  public function country(Countries $country){
    $firstpost = Post::where('country_id',$country->id)->orderBy('id', 'DESC')->first();
    $posts = Post::where('country_id',$country->id)->orderBy('id', 'DESC')->skip(1)->take(24)->get();
    $sections = Section::get();
    $check = true;
    $countries = Countries::get();
      return view('plportal.indexcountry')
      ->with('firstpost', $firstpost)
      ->with('posts', $posts)
      ->with('check', $check)
      ->with('country',$country)
      ->with('countries', $countries)
      ->with('sections', $sections);
  }

  public function sectioncountry(Section $section, Countries $country)
  {
    $main = $section->getposts()->where('country_id', $country->id)->sortDesc()->paginate( 20 );
    $posts = $section->getposts()->sortByDesc('id')->take(10);
    $topposts = $section->getposts()->sortByDesc('reads')->take(10);
    $categorylist = Category::where('section_id',$section->id)
                             ->where('parent_category_id',null)
                             ->get();
    $sections = Section::get();
    $cleansection = str_replace(',','',strtolower(preg_replace('/\s+/', '', $section->section)));
    $countries = Countries::get();
    return view('plportal.category')
    ->with('main', $main)
    ->with('posts', $posts)
    ->with('topposts', $topposts)
    ->with('section', $cleansection)
    ->with('topsection', $section)
    ->with('serachsection', $section)
    ->with('countries', $countries)
    ->with('sections', $sections)
    ->with('topcategory', $country->country)
    ->with('categories', $categorylist);
  }

}
