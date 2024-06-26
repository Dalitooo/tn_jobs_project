<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruteurController;
use App\Models\Candidat;
use App\Models\OffreEmploi;
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
    $offres = OffreEmploi::where('verif', true)
    ->orderBy('created_at', 'desc')
    ->take(4)
    ->get();;
    return view('index', compact('offres'));
});
Route::get('/offre/search',[OffreController::class,'search'])->name('offre.search');
Route::get('/offre',[OffreController::class,'index'])->name('offre.index');
Route::get('/offre/{offre}',[OffreController::class,'show'])->name('offre.show');
Route::get('/recruteurs',[RecruteurController::class,'index'])->name('recruteur.index');
Route::get('/recruteurs/search',[RecruteurController::class,'search'])->name('recruteur.search');
Route::get('/recruteurs/{recruteur}',[RecruteurController::class,'show'])->name('recruteur.show');
Route::get('/candidats',[CandidatController::class,'index'])->name('candidat.index');
Route::get('/candidats/search', [CandidatController::class, 'search'])->name('candidat.search');
Route::get('/candidats/{candidat}',[CandidatController::class,'show'])->name('candidat.show');
Route::get('/candidats/{candidat}/download-cv', [CandidatController::class,'downloadCV'])->name('candidat.downloadCV');


/*candidat*/
Route::group(
    [
        'middleware'=>['auth','verified','user.role:candidat'],
        'prefix'=>'candidat',
        'as'=>'candidat.'
    ],function(){
        Route::get('dashboard',  [CandidatController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [CandidatController::class, 'create'])->name('create');
        Route::post('store', [CandidatController::class, 'store'])->name('store');
        Route::get('editPrivacy',[CandidatController::class,'editPrivacy'])->name('editPrivacy');
        route::post('candidatures/store/{id}',[CandidatureController::class,'store'])->name('candidature.store');
        route::get('candidatures',[CandidatureController::class,'myCandidaturesCandidat'])->name('candidatures');
        route::get('candidature/accepted/{candidature}',[CandidatureController::class,'accepted'])->name('candidatures.accepted');
        route::get('candidature/refused/{candidature}',[CandidatureController::class,'refused'])->name('candidatures.refused');
    }
);


/*recruteur*/
Route::group(
    [
        'middleware'=>['auth','verified','user.role:recruteur'],
        'prefix'=>'recruteur',
        'as'=>'recruteur.'
    ],function(){
        Route::get('dashboard',[RecruteurController::class,'dashboard'])->name('dashboard');
        Route::get('profile',[RecruteurController::class,'create'])->name('create');
        Route::post('store',[RecruteurController::class,'store'])->name('store');
        route::get('offre/create',[OffreController::class,'create'])->name('offre.create');
        route::get('offre',[OffreController::class,'myOffres'])->name('offre');
        route::post('offre/store',[OffreController::class,'store'])->name('offre.store');
        route::get('offre/edit/{offre}',[OffreController::class,'edit'])->name('offre.edit');
        route::put('offre/update/{offre}',[OffreController::class,'update'])->name('offre.update');
        route::delete('offre/delete/{offre}',[OffreController::class,'destroy'])->name('offre.destroy');
        route::get('candidatures',[CandidatureController::class,'myCandidaturesRecruteur'])->name('candidatures');
        route::post('candidatures/accepter/{candidature}',[CandidatureController::class,'accepter'])->name('candidatures.accepter');
        route::post('candidatures/refuser/{candidature}',[CandidatureController::class,'refuser'])->name('candidatures.refuser');

    }
);
/*admin*/
Route::group(
    [
        'middleware'=>['auth','verified','user.role:admin'],
        'prefix'=>'admin',
        'as'=>'admin.'
    ],function(){
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        route::get('offers/pending',[AdminController::class,'pendingOffers'])->name('offers.pending');
        route::get('offers/accepted',[AdminController::class,'validOffers'])->name('offers.valid');
        route::get('offers/refused',[AdminController::class,'rejectedOffers'])->name('offers.refused');
        route::get('offers/{offer}',[AdminController::class,'offerDetails'])->name('offers.details');
        route::put('offers/accepter/{id}',[AdminController::class,'acceptOffer'])->name('offers.accepter');
        route::put('offers/refuser/{id}',[AdminController::class,'refuseOffer'])->name('offers.refuser');
        route::get('candidats/pending',[AdminController::class,'pendingCandidats'])->name('candidats.pending');
        route::get('candidats/accepted',[AdminController::class,'validCandidats'])->name('candidats.valid');
        route::get('candidats/refused',[AdminController::class,'rejectedCandidats'])->name('candidats.refused');
        route::put('candidats/accepter/{id}',[AdminController::class,'acceptCandidat'])->name('candidats.accepter');
        route::put('candidats/refuser/{id}',[AdminController::class,'refuseCandidat'])->name('candidats.refuser');
        route::get('candidats/{candidat}',[AdminController::class,'candidatDetails'])->name('candidats.details');
        route::get('recruteurs/pending',[AdminController::class,'pendingRecruteurs'])->name('recruteurs.pending');
        route::get('recruteurs/accepted',[AdminController::class,'validRecruteurs'])->name('recruteurs.valid');
        route::get('recruteurs/refused',[AdminController::class,'rejectedRecruteurs'])->name('recruteurs.refused');
        route::put('recruteurs/accepter/{id}',[AdminController::class,'acceptRecruteur'])->name('recruteurs.accepter');
        route::put('recruteurs/refuser/{id}',[AdminController::class,'refuseRecruteur'])->name('recruteurs.refuser');
        route::get('recruteurs/{recruteur}',[AdminController::class,'recruteurDetails'])->name('recruteurs.details');

    }
);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
