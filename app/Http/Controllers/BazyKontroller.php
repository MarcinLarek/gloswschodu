<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Baza;

class BazyKontroller extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function AddBazaWiedzy()
  {
      return view('BazaWiedzy/AddBazaWiedzy');
  }
  public function bazawiedzystore()
  {
    $data = request()->validate([
          'title' => 'required',
          'image' => ['required', 'image'],
      ]);
      $editor_data = $_POST[ 'description' ];
    $imagePath = request('image')->store('uploads', 'public');

    auth()->user()->bazas()->create([
          'title' => $data['title'],
          'description' => $editor_data,
          'image' => $imagePath,
      ]);

      return redirect('/BazaWiedzy/bazawiedzy');
  }

}
