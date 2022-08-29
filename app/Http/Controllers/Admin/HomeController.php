<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Countries;

class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::get();
        $countries = Countries::get();
        $check = true;
        return view('admin.index')
        ->with('countries', $countries)
        ->with('check', $check)
        ->with('sections', $sections);
    }

}
