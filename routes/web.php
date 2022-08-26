<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::domain(config('app.name'))->group(function () {
  Route::middleware('auth:admin')->group(function () {
      Route::post('/images', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store');

        Route::prefix('/admin/admins')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\AdminsController::class, 'adminslist'])->name('admin.admins');
            Route::get('/create', [\App\Http\Controllers\Admin\AdminsController::class, 'create'])->name('admin.admins.create');
            Route::post('/store', [\App\Http\Controllers\Admin\AdminsController::class, 'store'])->name('admin.admins.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\AdminsController::class, 'edit'])->name('admin.admins.edit');
            Route::patch('/{id}/update', [\App\Http\Controllers\Admin\AdminsController::class, 'update'])->name('admin.admins.update');
            Route::get('/{id}/delete', [\App\Http\Controllers\Admin\AdminsController::class, 'delete'])->name('admin.admins.delete');
            Route::post('/{id}/deleteadmin', [\App\Http\Controllers\Admin\AdminsController::class, 'deleteadmin'])->name('admin.admins.deleteadmin');
            Route::get('/{id}/editprivileges', [\App\Http\Controllers\Admin\AdminsController::class, 'editprivileges'])->name('admin.admins.editprivileges');
            Route::get('/{adminid}/storeprivileges/{sectionid}', [\App\Http\Controllers\Admin\AdminsController::class, 'storeprivileges'])->name('admin.admins.storeprivileges');

        });

        Route::prefix('/admin/category')->group(function () {
            Route::get('/selectsection', [\App\Http\Controllers\Admin\CategoryController::class, 'selectsection'])->name('admin.category.selectsection');
            Route::get('/{section}/createcategory', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');


        });

        Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
        Route::get('/admin/create/{section}', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.post.create');
        Route::get('/addsubcategory', [\App\Http\Controllers\Admin\PostController::class, 'addsubcategory'])->name('admin.addsubcategory');
        Route::get('/admin/edit/{post}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.post.edit');
        Route::get('/admin/list/{section}', [App\Http\Controllers\Admin\PostController::class, 'list'])->name('admin.post.list');
        Route::post('/admin/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.post.store');
        Route::patch('/admin/update/{post}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.post.update');
        Route::get('/admin/{post}/delete', [\App\Http\Controllers\Admin\PostController::class, 'delete'])->name('admin.post.delete');
        Route::post('/admin/{post}/deletpost', [\App\Http\Controllers\Admin\PostController::class, 'deletepost'])->name('admin.post.deletepost');
        Route::get('/admin/temppostmaker', [App\Http\Controllers\Admin\PostController::class, 'temppostmaker'])->name('admin.temppostmaker');

    });

    Route::middleware('guest')->group(function () {
            Route::prefix('/sign-in')->group(function () {
                Route::get('/', [\App\Http\Controllers\Admin\SignInController::class, 'index'])->name('admin.sign-in');
                Route::post('/login', [\App\Http\Controllers\Admin\SignInController::class, 'login'])->name('admin.login');
                Route::get('/LoginAdmin', [\App\Http\Controllers\Admin\SignInController::class, 'LoginAdmin'])->name('admin.LoginAdmin');
                Route::get('/AdminLogin/{token}', [\App\Http\Controllers\Admin\SignInController::class, 'AdminLogin'])->name('admin.AdminLogin');
                Route::get('/adminlogout', [\App\Http\Controllers\Admin\SignInController::class, 'adminlogout'])->name('admin.adminlogout');
            });
        });

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
        Route::get('/{section}', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
        Route::get('/{section}/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
        Route::get('/{section}/Kategorie/{category}', [App\Http\Controllers\PostController::class, 'category'])->name('post.category');
        Route::get('/{section}/wyszukaj/{search?}', [App\Http\Controllers\PostController::class, 'getsearch'])->name('get.serach');
        Route::post('/wyszukaj/{section}/', [App\Http\Controllers\PostController::class, 'search'])->name('post.serach');


});

Auth::routes();
