<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class ImageController extends Controller
{
    public function store(Request $request)
    {
      $task = new Task();
      $task->id = 0;
      $task->exists = true;
      $image = $task->addMediaFromRequest( key: 'upload')->toMediaCollection( collectionName: 'images');

      return response()->json([
           'url' => $image->getUrl()
      ]);
    }
}
