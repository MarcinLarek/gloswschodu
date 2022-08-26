<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Oferty;

class OfertyController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function AddOferta()
  {
      return view('Oferty/AddOferta');
  }
  public function ofertastore()
  {
    $data = request()->validate([
          'title' => 'required',
          'image' => ['required', 'image'],
      ]);
      $editor_data = $_POST[ 'description' ];
    $imagePath = request('image')->store('uploads', 'public');

    auth()->user()->oferties()->create([
          'title' => $data['title'],
          'description' => $editor_data,
          'image' => $imagePath,
      ]);

      return redirect('/Oferty/naszeoferty');
  }

}
