<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\ClientViewController;
use App\Http\Models\Ekraan;


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

$routes = new ClientViewController;

foreach($routes->show_ekraan_route() as $key => $row){
    Route::resource($row->url, ClientViewController::class);
}


Route::resource('client', ClientViewController::class);

//admin view routes

Route::resource('admin', AdminViewController::class);
//Route::get('change_language', [ClientViewController::class, 'change_language']);
Route::get('change_language', [ClientViewController::class, 'change_language'])->name('change_language');
