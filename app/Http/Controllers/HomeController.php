<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Post;

class HomeController extends Controller
{
     public function index()
     {
       $firstpost = Post::orderBy('id', 'DESC')->first();
       $posts = Post::orderBy('id', 'DESC')->skip(1)->take(24)->get();
       $sections = Section::get();
       /*
       $fakty = Section::where('section','Fakty')->first();
       $fakty = $fakty->getposts();
       $fakty = $fakty->take(5);
       $biznes = Section::where('section','Biznes')->first();
       $biznes = $biznes->getposts();
       $biznes = $biznes->take(5);
       $sport = Section::where('section','Sport')->first();
       $sport = $sport->getposts();
       $sport = $sport->take(5);
       $salonpolityczny = Section::where('section','Salon Polityczny')->first();
       $salonpolityczny = $salonpolityczny->getposts();
       $salonpolityczny = $salonpolityczny->take(5);
       $kfd = Section::where('section','Kobieta, Facet Dziecko')->first();
       $kfd = $kfd->getposts();
       $kfd = $kfd->take(5);
       $hobby = Section::where('section','Hobby')->first();
       $hobby = $hobby->getposts();
       $hobby = $hobby->take(5);
       $kultura = Section::where('section','Kultura')->first();
       $kultura = $kultura->getposts();
       $kultura = $kultura->take(5);
       $motoryzacja = Section::where('section','Motoryzacja')->first();
       $motoryzacja = $motoryzacja->getposts();
       $motoryzacja = $motoryzacja->take(5);
       $naukaitechnologie = Section::where('section','Nauka i Technologie')->first();
       $naukaitechnologie = $naukaitechnologie->getposts();
       $naukaitechnologie = $naukaitechnologie->take(5);
       $historia = Section::where('section','Historia')->first();
       $historia = $historia->getposts();
       $historia = $historia->take(5);
       $slubzbymundurowe = Section::where('section','Służby Mundurowe')->first();
       $slubzbymundurowe = $slubzbymundurowe->getposts();
       $slubzbymundurowe = $slubzbymundurowe->take(5);
       $turystyka = Section::where('section','Turystyka')->first();
       $turystyka = $turystyka->getposts();
       $turystyka = $turystyka->take(5);
       $spoleczenstwo = Section::where('section','Społeczeństwo')->first();
       $spoleczenstwo = $spoleczenstwo->getposts();
       $spoleczenstwo = $spoleczenstwo->take(5);
       */
         return view('plportal.index')
         ->with('firstpost', $firstpost)
         ->with('posts', $posts)
         /*->with('fakty', $fakty)
         ->with('biznes', $biznes)
         ->with('sport', $sport)
         ->with('salonpolityczny', $salonpolityczny)
         ->with('kfd', $kfd)
         ->with('hobby', $hobby)
         ->with('kultura', $kultura)
         ->with('motoryzacja', $motoryzacja)
         ->with('naukaitechnologie', $naukaitechnologie)
         ->with('historia', $historia)
         ->with('slubzbymundurowe', $slubzbymundurowe)
         ->with('turystyka', $turystyka)
         ->with('spoleczenstwo', $spoleczenstwo)
         */
         ->with('sections', $sections);
     }

}
