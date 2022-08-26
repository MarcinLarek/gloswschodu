<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Section;

class AdminsController extends Controller
{
    public function adminslist()
    {
      $admins = Admin::all();
      $sections = Section::get();
      return view('admin.admins.index')
      ->with('admins', $admins)
      ->with('sections', $sections);
    }

    public function edit($id)
    {
      $admin = Admin::find($id);
      $sections = Section::get();
      return view('admin.admins.edit')
      ->with('admin', $admin)
      ->with('sections', $sections);
    }
    public function create()
    {
      $sections = Section::get();
      return view('admin.admins.create')
      ->with('sections', $sections);
    }

    public function update($id, Request $request)
    {
        $request->validate([
          'login' => ['required','max:100'],
          'name' => ['required','max:100'],
          'surname' => ['required','max:100'],
          'password' => ['max:100'],
          'global_privileges' => ['required'],
          'email' => ['required','max:100']
      ]);
      if ($request['password'] == null) {
          $data = array(
      'login' => $request['login'],
      'name' => $request['name'],
      'surname' => $request['surname'],
      'global_privileges' => $request['global_privileges'],
      'email' => $request['email']
    );
      } else {
          $data = array(
      'login' => $request['login'],
      'name' => $request['name'],
      'surname' => $request['surname'],
      'global_privileges' => $request['global_privileges'],
      'password' => Hash::make($request['password']),
      'email' => $request['email']
    );
      }

      $admin = Admin::find($id);
      $admin->update($data);
      return redirect()->route('admin.admins')->with('successalert', 'successalert');
    }

    public function store(Request $request)
    {
        $request->validate([
          'login' => ['required','max:100'],
          'name' => ['required','max:100'],
          'surname' => ['required','max:100'],
          'password' => ['max:100'],
          'global_privileges' => ['required'],
          'email' => ['required','max:100']
      ]);
      $data = array(
  'login' => $request['login'],
  'name' => $request['name'],
  'surname' => $request['surname'],
  'global_privileges' => $request['global_privileges'],
  'password' => Hash::make($request['password']),
  'email' => $request['email'],
  'token' => Str::random(60)
);

      $admin = Admin::create($data);
      return redirect()->route('admin.admins')->with('successalert', 'successalert');
    }

    public function delete($id)
    {
      $admin = Admin::find($id);
      $sections = Section::get();
      return view('admin.admins.delete')
      ->with('admin', $admin)
      ->with('sections', $sections);
    }
    public function deleteadmin($id)
    {
      $admin = Admin::find($id);
      $admin->delete();
      $admins = Admin::all();
      return redirect()->route('admin.admins')->with('successalert', 'successalert');
    }

    public function editprivileges($id)
    {
      $admin = Admin::find($id);
      $sections = Section::get();
      return view('admin.admins.editprivileges')
      ->with('admin', $admin)
      ->with('sections', $sections);

    }

    public function storeprivileges($adminid,$sectionid)
    {
      $admin = Admin::find($adminid);
      $section = Section::find($sectionid);
      $admin->menages()->toggle($sectionid);
      return redirect()->back();

    }



}
