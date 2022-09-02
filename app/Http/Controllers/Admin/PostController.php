<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategories;
use App\Models\Countries;

class PostController extends Controller
{
    public function list($section)
    {
        $permissioncheck = Section::where('section',$section)->first();
        $posts = $permissioncheck->getposts();
        $sections = Section::get();
        $tempsection = Section::where('section', $section)->first();
        $category = Category::where('section_id',$tempsection['id'])->get();
        $countries = Countries::get();
        $check = true;
        return view('admin.list')
              ->with('sections', $sections)
              ->with('section', $section)
              ->with('posts', $posts)
              ->with('check', $check)
              ->with('countries', $countries)
              ->with('category', $category)
              ->with('permissioncheck',$permissioncheck);
    }

    public function create($section)
    {
        $permissioncheck = Section::where('section',$section)->first();
        $sections = Section::get();
        $tempsection = Section::where('section', $section)->first();
        $category = Category::where('section_id',$tempsection['id'])->get();
        $countries = Countries::get();
        $check = true;
        return view('admin.create')
              ->with('sections', $sections)
              ->with('section', $section)
              ->with('countries', $countries)
              ->with('check', $check)
              ->with('category', $category)
              ->with('permissioncheck',$permissioncheck);
    }

    public function edit($post)
    {
        $post = Post::find($post);
        $section = $post->getsection();
        $section = $section->section;
        $permissioncheck = Section::where('section',$section)->first();
        $sections = Section::get();
        $check = true;
        $tempsection = Section::where('section', $section)->first();
        $category = Category::where('section_id',$tempsection['id'])->get();
        $countries = Countries::get();
        return view('admin.edit')
              ->with('post', $post)
              ->with('sections', $sections)
              ->with('check', $check)
              ->with('section', $section)
              ->with('countries', $countries)
              ->with('category', $category)
              ->with('permissioncheck',$permissioncheck);
    }

    public function update($post, PostRequest $request)
    {

        $post = Post::find($post);
        $imagePath = request('image')->store('uploads', 'public');
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/'.$imagePath);

        //ImageOptimizer::optimize('storage/'.$imagePath);

        $data = array(
         'title' => $request['title'],
         'summary' => $request['summary'],
         'author' => $request['author'],
         'country_id' => $request['country'],
         'source' => $request['source'],
         'postcontent' => $request['postcontent'],
         'image' => $imagePath,
       );

      $post->update($data);
        return redirect()->back()->with('successalert', 'successalert');
    }

    public function store(PostRequest $request)
    {
        $request['seo'] = $this->seo($request['seo']);
        $section = Section::where('section', $request['section'])->first();
        $imagePath = request('image')->store('uploads', 'public');
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize('storage/'.$imagePath);

        //ImageOptimizer::optimize('storage/'.$imagePath);
        $data = array(
         'admin_id' => auth()->user()->id,
         'country_id' => $request['country'],
         'section_id' => $section->id,
         'title' => $request['title'],
         'seo' => $request['seo'],
         'summary' => $request['summary'],
         'author' => $request['author'],
         'source' => $request['source'],
         'postcontent' => $request['postcontent'],
         'image' => $imagePath,
       );

       Post::create($data);
       $post = Post::latest()->first();
       foreach ($request['category'] as $cat) {
          $data = array(
            'post_id' => $post['id'],
            'category_id' => $cat
          );
        PostCategories::create($data);
       }

        return redirect()->back()->with('successalert', 'successalert');
    }

    public function seo($title)
    {
      $title = strtolower($title);
      $title = str_replace('ż', 'z', $title);
      $title = str_replace('ą', 'a', $title);
      $title = str_replace('ć', 'c', $title);
      $title = str_replace('ę', 'e', $title);
      $title = str_replace('ł', 'l', $title);
      $title = str_replace('ń', 'n', $title);
      $title = str_replace('ó', 'o', $title);
      $title = str_replace('ś', 's', $title);
      $title = str_replace('ź', 'z', $title);
      $title = str_replace('.', '', $title);
      $title = str_replace(',', '', $title);
      $title = str_replace('?', '', $title);
      $title = str_replace('"', '', $title);
      $title = str_replace('\'', '', $title);
      $title = str_replace('(', '', $title);
      $title = str_replace(')', '', $title);
      $title = str_replace('\\', '', $title);
      $title = str_replace('/', '', $title);
      $title = str_replace('@', '', $title);
      $title = str_replace('#', '', $title);
      $title = str_replace('$', '', $title);
      $title = str_replace('%', '', $title);
      $title = str_replace('^', '', $title);
      $title = str_replace('&', '', $title);
      $title = str_replace('*', '', $title);
      $title = str_replace('”', '', $title);
      $title = str_replace('„', '', $title);
      $title = preg_replace('/\s+/', '-', $title);
      return $title;
    }

    public function delete($id)
    {
      $post = Post::find($id);
      $sections = Section::get();
      $check = true;
      $countries = Countries::get();
      return view('admin.postdelete')
      ->with('countries', $countries)
      ->with('post', $post)
      ->with('check', $check)
      ->with('sections', $sections);
    }
    public function deletepost($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect()->route('admin.index')->with('successalert', 'successalert');
    }

    public function seomaker()
        {
          $posts = Post::get();
      foreach ($posts as $post) {
        $post->seo =  $this->seo($post->seo);
        $post->update();
      }
          /*
          $posts = Post::get();
          foreach ($posts as $post) {
            if ($post->seo == null) {
              $post->seo =  $this->seo(substr($post->title, 0, 100));
              $post->update();
            }
          }*/
          return redirect()->route('admin.index')->with('successalert', 'successalert');


        }

    public function temppostmaker()
    {
      /*
      $categories = Category::get();

      if (Post::get()->isempty()) {
        $i = 1;
      }
      else {
        $i = Post::orderBy('id', 'desc')->first()->id;
        $i++;
      }

        foreach ($categories as $category) {
          if ($category->getposts()->isempty()) {
            for ($b=0; $b < 11; $b++) {
            $data = array(
             'admin_id' => auth()->user()->id,
             'country_id' => rand(1,13),
             'section_id' => $category->getsection()->id,
             'title' => 'Test Title ',
             'author' => 'Test author',
             'source' => 'test source',
             'postcontent' => 'asdihas dkljsad kljsd ajads oidjs iodsajoiasdj iodsajadsoi jdas iojdsaoi jadsio jsadio jaisodj ioasdj saiojd saiojd ioasj iasdjasdiojasd iodasj ioasd jioasd joiasdj sadioj dsaiojdas is adjiodasjoiasdj ioasjds iojadsiodas jiodsaj idoasj dsaioj dsaiojd asiodj sioasj iasodj asoid jasido jasiojas ofjipsjd dfgjsdi j[-figsj isdgjdaf[sigsdj]]',
             'image' => 'uploads/u1GNj6AAwIYdns643P5qD8eYiEEr1PLhCg5uT8nH.jpg',
           );
           Post::create($data);
           $post = Post::latest()->first();
           $data2 = array(
             'post_id' => $i,
             'category_id' => $category->id,
           );
           PostCategories::create($data2);
           $i++;
           }
          }
        }
      */
      return redirect()->back()->with('successalert', 'successalert');
    }
}
