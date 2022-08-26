<?php

use Illuminate\Support\Facades\Route;
use App\Models\Oferty;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/instalacje', [App\Http\Controllers\HomeController::class, 'instalacje'])->name('instalacje');
Route::get('/onas', [App\Http\Controllers\HomeController::class, 'onas'])->name('onas');
Route::get('/kalkulator', [App\Http\Controllers\HomeController::class, 'kalkulator'])->name('kalkulator');
Route::get('/naszerealizacje', [App\Http\Controllers\HomeController::class, 'naszerealizacje'])->name('naszerealizacje');
Route::get('/kontakt', [App\Http\Controllers\HomeController::class, 'kontakt'])->name('kontakt');
Route::get('/fotowoltaikadladomu', [App\Http\Controllers\HomeController::class, 'fotowoltaikadladomu'])->name('fotowoltaikadladomu');
Route::get('/fotowoltaikadlafirmy', [App\Http\Controllers\HomeController::class, 'fotowoltaikadlafirmy'])->name('fotowoltaikadlafirmy');
Route::get('/fotowoltaikadlarolnika', [App\Http\Controllers\HomeController::class, 'fotowoltaikadlarolnika'])->name('fotowoltaikadlarolnika');
Route::get('/Regulamin', [App\Http\Controllers\HomeController::class, 'Regulamin'])->name('Regulamin');
Route::get('/kosztyisposobydostawy', [App\Http\Controllers\HomeController::class, 'kosztyisposobydostawy'])->name('kosztyisposobydostawy');
Route::get('/sposobyplatnosci', [App\Http\Controllers\HomeController::class, 'sposobyplatnosci'])->name('sposobyplatnosci');
Route::get('/prawoodstapieniaodumowy', [App\Http\Controllers\HomeController::class, 'prawoodstapieniaodumowy'])->name('prawoodstapieniaodumowy');
Route::get('/politykaprywatnosci', [App\Http\Controllers\HomeController::class, 'politykaprywatnosci'])->name('politykaprywatnosci');

Route::get('/Aktualnosci/aktualnosci', [App\Http\Controllers\HomeController::class, 'aktualnosci'])->name('aktualnosci');
Route::post('/Aktualnosci/aktualnoscistore', [App\Http\Controllers\AktualnosciController::class, 'aktualnoscistore']);
Route::get('/Aktualnosci/AddAktualnosci', [App\Http\Controllers\AktualnosciController::class, 'AddAktualnosci'])->name('AddAktualnosci');
Route::get('/Aktualnosci/create', [App\Http\Controllers\AktualnosciController::class, 'create']);
Route::get('/Aktualnosci/{aktualnosc}', [App\Http\Controllers\HomeController::class, 'aktualnoscishow']);

Route::get('/BazaWiedzy/bazawiedzy', [App\Http\Controllers\HomeController::class, 'bazawiedzy'])->name('bazawiedzy');
Route::post('/BazaWiedzy/bazawiedzystore', [App\Http\Controllers\BazyKontroller::class, 'bazawiedzystore']);
Route::get('/BazaWiedzy/AddBazaWiedzy', [App\Http\Controllers\BazyKontroller::class, 'AddBazaWiedzy'])->name('AddBazaWiedzy');
Route::get('/BazaWiedzy/create', [App\Http\Controllers\BazyKontroller::class, 'create']);
Route::get('/BazaWiedzy/{baza}', [App\Http\Controllers\HomeController::class, 'bazawiedzyshow']);

Route::get('/Oferty/naszeoferty', [App\Http\Controllers\HomeController::class, 'naszeoferty'])->name('naszeoferty');
Route::post('/Oferty/ofertastore', [App\Http\Controllers\OfertyController::class, 'ofertastore']);
Route::get('/Oferty/AddOferta', [App\Http\Controllers\OfertyController::class, 'AddOferta'])->name('AddOferta');
Route::get('/Oferty/create', [App\Http\Controllers\OfertyController::class, 'create']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/images', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store');
