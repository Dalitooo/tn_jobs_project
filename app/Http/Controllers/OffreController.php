<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class OffreController extends Controller
{

    public function index(){
        $offres=OffreEmploi::orderBy('created_at', 'desc')->paginate(5);
        return view('offre.index',['offres'=>$offres]);
    }
    public function latestOffers(){
        $offres = OffreEmploi::orderBy('created_at', 'desc')->take(4)->get();
        return view('sections.jobs-section', ['offres' => $offres]);
    }

    public function search(Request $request){
        $searchTerm=$request->input('search');
        $offres = OffreEmploi::where('poste','like',"%$searchTerm%")
                            ->orWhere('description','like',"%$searchTerm%")
                            ->orWhere('exigence','like',"%$searchTerm%")
                            ->orWhere('lieu','like',"%$searchTerm%")
                            ->orWhere('salaire','like',"%$searchTerm%")
                            ->paginate(5);
        return view('offre.offre-search', ['offres' => $offres]);
    }

    public function myOffres(){
        $user = auth()->user();
        if ($user->recruteur && !$user->recruteur->verif) {
            // Flasher un message dans la session pour indiquer que le compte est en attente de vérification
            session()->flash('message', 'Votre compte est en attente de vérification par l\'administrateur.');

            // Rediriger l'utilisateur vers une page d'attente ou le tableau de bord par exemple
            return redirect()->route('recruteur.dashboard');
        }
        if (!$user->recruteur) {
            return redirect()->route('recruteur.create')->with('message', 'Veuillez configurer votre profil recruteur pour accéder à vos offres.');
        }

        $recruteurId = $user->recruteur->id;
        $myOffres = OffreEmploi::where('recruteur_id',$recruteurId)->paginate(5);
        return view('recruteur.offre_emploi.liste-offre',compact('myOffres'));
    }

    public function create(){

        $user = auth()->user();
        if (!$user->recruteur) {
            // Rediriger l'utilisateur pour créer son profil de recruteur
            return redirect()->route('recruteur.create')->with('message', 'Veuillez configurer votre profil recruteur pour accéder à vos offres.');
        }

        // Vérifiez si l'utilisateur est un recruteur et si son compte est vérifié
        if ($user->recruteur && !$user->recruteur->verif) {
            // Flasher un message dans la session pour indiquer que le compte est en attente de vérification
            session()->flash('message', 'Votre compte est en attente de vérification par l\'administrateur.');

            // Rediriger l'utilisateur vers une page d'attente ou le tableau de bord par exemple
            return redirect()->route('recruteur.dashboard');
        }

        // Si le compte est vérifié, affichez la vue pour créer une offre
        return view('recruteur.offre_emploi.create-offre');
        }

    public function store(Request $request){
        $data=$request->validate([
            'poste' => 'required|string',
            'description' => 'required|string|max:350',
            'exigence' => 'required|string|max:350',
            'salaire' => 'required|numeric',
            'date_fin_offre' => 'required|date|after_or_equal:today',
            'lieu' => 'required|string',
        ]);

        $newOffre=OffreEmploi::Create([
            'recruteur_id' => auth()->user()->recruteur->id,
            'poste' => $data['poste'],
            'description' => $data['description'],
            'exigence' => $data['exigence'],
            'salaire' => $data['salaire'],
            'date_fin_offre' => $data['date_fin_offre'],
            'lieu' => $data['lieu'],
            'verif' => null,
        ]
        );
        return redirect(route('recruteur.dashboard'));
    }

    public function edit(OffreEmploi $offre){
        $recruteurId = auth()->user()->recruteur->id;
        if ($offre->recruteur_id !== $recruteurId) {
            abort(403, 'Unauthorized action.');
        }

        return view('recruteur.offre_emploi.update-offre',['offre'=>$offre]);
    }
    public function show(OffreEmploi $offre){
        if ($offre->verif) {
            return view('offre.job-detail', ['offre' => $offre]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(OffreEmploi $offre,Request $request){
        $data=$request->validate([
            'poste' => 'required|string',
            'description' => 'required|string|max:250',
            'exigence' => 'required|string|max:250',
            'salaire' => 'required|numeric',
            'date_fin_offre' => 'required|date|after_or_equal:today',
            'lieu' => 'required|string',
        ]);

        $offre->update($data);
        return redirect(route('recruteur.offre.edit',['offre'=>$offre]))->with('success', 'Offre Updated Succesffully');

    }
    public function destroy(OffreEmploi $offre){
        $offre->delete();
        return redirect(route('recruteur.offre'))->with('success', 'Offre deleted Succesffully');

    }

}
