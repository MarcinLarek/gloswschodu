<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Section;

class CategoryController extends Controller
{
    public function create($section)
    {
      $section = Section::where('section', $section)->first();
      $sections = Section::get();
      $category = $section->getcategories();
      return view('admin.category.create')
      ->with('sections', $sections)
      ->with('section', $section)
      ->with('category', $category);
    }

    public function selectsection()
    {
      $sections = Section::get();
      return view('admin.category.selectsection')
      ->with('sections', $sections);
    }

    public function store(Request $request)
    {
        $request->validate([
          'category' => ['required','max:100'],
          'section_id' => ['required','max:100']
      ]);
        $data = array(
          'category' => $request['category'],
          'section_id' => $request['section_id'],
          'parent_category_id' => $request['parent_category_id'],
        );
      Category::create($data);
      return redirect()->back()->with('successalert', 'successalert');
    }

}
