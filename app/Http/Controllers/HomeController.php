<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferty;
use App\Models\Aktualnosci;
use App\Models\Baza;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function Instalacje()
    {
        return view('Instalacje');
    }
    public function onas()
    {
        return view('onas');
    }
    public function kalkulator()
    {
        return view('kalkulator');
    }
    public function naszerealizacje()
    {
        return view('naszerealizacje');
    }
    public function kontakt()
    {
        return view('kontakt');
    }
    public function fotowoltaikadladomu()
    {
        return view('fotowoltaikadladomu');
    }
    public function fotowoltaikadlafirmy()
    {
        return view('fotowoltaikadlafirmy');
    }
    public function fotowoltaikadlarolnika()
    {
        return view('fotowoltaikadlarolnika');
    }
    public function Regulamin()
    {
        return view('Regulamin');
    }
    public function kosztyisposobydostawy()
    {
        return view('kosztyisposobydostawy');
    }
    public function sposobyplatnosci()
    {
        return view('sposobyplatnosci');
    }
    public function prawoodstapieniaodumowy()
    {
        return view('prawoodstapieniaodumowy');
    }
    public function politykaprywatnosci()
    {
        return view('politykaprywatnosci');
    }


    public function bazawiedzy()
    {
        $bazas = DB::table('bazas')->get();
        return view('BazaWiedzy/bazawiedzy', ['bazas' => $bazas]);
    }

    public function naszeoferty()
    {
        $oferies = DB::table('oferties')->get();
        return view('Oferty/naszeoferty', ['oferties' => $oferies]);
    }
    public function aktualnosci()
    {
        $aktualnoscis = DB::table('aktualnoscis')->get();
        return view('Aktualnosci/aktualnosci', ['aktualnoscis' => $aktualnoscis]);
    }
    public function bazawiedzyshow(\App\Models\Baza $baza)
      {
          $list = Baza::latest()->take(5)->get();
          return view ('BazaWiedzy/bazawiedzyshow', compact('baza'),['list' => $list]);
      }
    public function aktualnoscishow(\App\Models\Aktualnosci $aktualnosc)
      {
          $list = Aktualnosci::latest()->take(5)->get();
          return view ('Aktualnosci/aktualnoscishow', compact('aktualnosc'),['list' => $list]);
      }
}
