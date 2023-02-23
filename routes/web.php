<?php

use App\Http\Controllers\AnneeScolaireController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ConduiteController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\ScolariteController;
use App\Http\Controllers\TitreApplicationController;
use App\Http\Controllers\TitreConduiteController;
use App\Http\Controllers\TitreCourController;
use App\Http\Controllers\TitrePeriodeController;
use App\Models\TitrePeriode;

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
    // return view('welcome');
    return view('dashboard.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('app', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('personnel/liste', [PersonneController::class, 'index'])->name('liste');
Route::get('personnel/creation', [PersonneController::class, 'create'])->name('creation');
Route::get('personnel/edition/{id}', [PersonneController::class, 'edit'])->name('edition');
Route::get('personnel/voir/{id}', [PersonneController::class, 'show'])->name('voir');


Route::post('personnel/store/{id}', [PersonneController::class, 'store'])->name('store');
Route::put('personnel/update/{id}', [PersonneController::class, 'update'])->name('update');
Route::delete('personnel/supprimer/{id}', [PersonneController::class, 'destroy'])->name('supprimer');
Route::resource('personnes', PersonneController::class);


Route::resources([
    'classes' => ClasseController::class,
    'titrePeriodes' => TitrePeriodeController::class,
    'titreConduites' => TitreConduiteController::class,
    'titreCours' => TitreCourController::class,
    'titreApplications' => TitreApplicationController::class,
    'cours' => CourController::class,
    'anneeScolaires' => AnneeScolaireController::class,
    'periodes' => PeriodeController::class,
    'eleves' => EleveController::class,
    'applications' => ApplicationController::class,
    'conduites' => ConduiteController::class,
    'scolarites' => ScolariteController::class,
    
]);
