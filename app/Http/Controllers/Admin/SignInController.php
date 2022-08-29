<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminLoginMail;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Countries;


class SignInController extends Controller
{
    public function index()
    {
        $notification = 0;
        $sections = Section::get();
        $countries = Countries::get();
        $check = true;
        return view('admin.sign-in.index')
        ->with('notification', $notification)
        ->with('check', $check)
        ->with('countries', $countries)
        ->with('sections', $sections);
    }

    public function login(Request $request)
    {
      $user = Admin::where('login', $request['username'])->first();
      if ($user !=null && Hash::check($request['password'], $user['password'])) {
          $user->update(['token' => Str::random(60)]);
          Mail::to($user['email'])->send(new AdminLoginMail($user));
          $notification = 2;
          $sections = Section::get();
          $countries = Countries::get();
          $check = true;
          return view('admin.sign-in.index')
      ->with('notification', $notification)
      ->with('countries', $countries)
      ->with('check', $check)
      ->with('sections', $sections);
      } else {
          $notification = 1;
          $sections = Section::get();
          $countries = Countries::get();
          $check = true;
          return view('admin.sign-in.index')
      ->with('notification', $notification)
      ->with('countries', $countries)
      ->with('check', $check)
      ->with('sections', $sections);
      }
    }

    public function AdminLogin($token)
    {
      $user = Admin::where('token', $token)->first();
      if ($user == null) {
          return redirect()->route('admin.index');
      }
      $user->update(['token' => Str::random(60)]);
      Auth::guard('admin')->login($user);
      return redirect()->route('admin.index');
    }

    public function adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}
