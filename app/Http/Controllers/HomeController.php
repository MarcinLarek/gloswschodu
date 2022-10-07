<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Post;
use App\Models\Countries;


class HomeController extends Controller
{
     public function index()
     {
       $posts = Post::with(['category', 'section'])->orderBy('id', 'DESC')->take(25)->get();
       $firstpost = $posts->first();
      $posts->shift();
       $sections = Section::get();
       $check = true;
       $countries = Countries::get();
         return view('plportal.index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         ->with('check', $check)
         ->with('countries', $countries)
         ->with('sections', $sections);
     }

}
