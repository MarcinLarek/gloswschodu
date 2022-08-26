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
       $firstpost = Post::orderBy('id', 'DESC')->first();
       $posts = Post::orderBy('id', 'DESC')->skip(1)->take(24)->get();
       $sections = Section::get();
       $countries = Countries::get();
         return view('plportal.index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         ->with('countries', $countries)
         ->with('sections', $sections);
     }

}
