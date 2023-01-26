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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

// Rotte che hanno bisogno di login

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin') // Cartella in cui si trovano i controller che indico qui cosi non lo riscrivo nelle route
    ->prefix('admin') // il mio localhost prenderà 8080/admin/   che diventa url base
    ->name('admin.') // da il nome al prefisso dei name delle rotte
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index'); // qui metto solo "/" perche il prefisso lo prende già dal prefix e metto solo il name della funzione perche con il name del gruppo avrò gia name.index
        // controllers per le crud
        Route::resource('/post', PostController::class); // da questo controller ho le crud per i post per esempio
    });


// Rotte libere

Route::get('{any?}', function () {
    return view('guest.home');
})->where("any", ".*");

// questa rotta da prendere cosi com'è manda alla view guest.home, cioe la pagina che sta dentro la cartella guest nelle views di blade

// occhio qua ai doppi apici (fai test)
