<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Aktualnosci;

class AktualnosciController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function AddAktualnosci()
  {
      return view('Aktualnosci/AddAktualnosci');
  }
  public function aktualnoscistore()
  {
    $data = request()->validate([
          'title' => 'required',
          'image' => ['image'],
      ]);
    $editor_data = $_POST[ 'description' ];
    $imagePath = request('image')->store('uploads', 'public');

    auth()->user()->aktualnoscis()->create([
          'title' => $data['title'],
          'description' => $editor_data,
          'image' => $imagePath,
      ]);

      return redirect('/Aktualnosci/aktualnosci');
  }

}
