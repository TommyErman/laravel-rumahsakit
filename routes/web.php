<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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



//#route Login 
Route::get('/', [LoginController::class, 'showLoginForm']);
// Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
// Route::post('/register/create', [RegisterController::class, 'create'])->name('createregister');

route::group(['middleware' => 'auth'], function () {
  // #dashboard
  Route::get('/profile', [DashboardController::class, 'index'])->name('profile');


  #controler dokter
  Route::get('/dokters/trash', [DokterController::class, 'trash']);
  Route::get('/dokters/restore/{id?}', [DokterController::class, 'restore']);
  Route::get('/dokters/delete/{id?}', [DokterController::class, 'delete']);
  Route::resource('dokters', DokterController::class);

  //#poli klinik
  Route::resource('polis', PoliController::class);

  // #pasien
  Route::get('/pasiens/trash', [PasienController::class, 'trash']);
  Route::get('/pasiens/restore/{id?}', [PasienController::class, 'restore']);
  Route::get('/pasiens/delete/{id?}', [PasienController::class, 'delete']);
  Route::resource('pasiens', PasienController::class);
});



// login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
