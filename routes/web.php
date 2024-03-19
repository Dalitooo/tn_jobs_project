<?php

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruteurController;
use App\Models\Candidat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/*candidat*/
Route::group(
    [
        'middleware'=>['auth','verified','user.role:candidat'],
        'prefix'=>'candidat',
        'as'=>'candidat.'
    ],function(){
        Route::get('dashboard', function () {return view('candidat.dashboard');})->name('dashboard');
        Route::get('profile', [CandidatController::class, 'create'])->name('create');
        Route::post('store', [CandidatController::class, 'store'])->name('store');
        Route::get('editPrivacy',[CandidatController::class,'editPrivacy'])->name('editPrivacy');
    }
);


/*recruteur*/
Route::group(
    [
        'middleware'=>['auth','verified','user.role:recruteur'],
        'prefix'=>'recruteur',
        'as'=>'recruteur.'
    ],function(){
        Route::get('dashboard', function () {return view('recruteur.dashboard');})->name('dashboard');
        Route::get('profile',[RecruteurController::class,'create'])->name('create');
        Route::post('store',[RecruteurController::class,'store'])->name('store');
        route::get('offre/create',[OffreController::class,'create'])->name('offre.create');
        route::get('offre/all',[OffreController::class,'myOffres'])->name('offre.index');
        route::post('offre/store',[OffreController::class,'store'])->name('offre.store');
        route::get('offre/edit/{offre}',[OffreController::class,'edit'])->name('offre.edit');
        route::put('offre/update/{offre}',[OffreController::class,'update'])->name('offre.update');
        route::delete('offre/delete/{offre}',[OffreController::class,'destroy'])->name('offre.destroy');

    }
);
/*admin*/
Route::group(
    [
        'middleware'=>['auth','verified','user.role:admin'],
        'prefix'=>'admin',
        'as'=>'admin.'
    ],function(){
        Route::get('dashboard', function () {
            return view('dashboard');})->name('dashboard');
    }
);




Route::get('/admin/dashboard', function () {
    return view('admin.test');
})->middleware(['auth', 'verified','user.role:admin'])->name('admin.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
