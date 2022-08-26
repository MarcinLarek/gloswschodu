<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\DB;
use App\Models\Section;

class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::get();
        return view('admin.index')
        ->with('sections', $sections);
    }

}
