<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class OffreController extends Controller
{

    public function index(){
        $offres=OffreEmploi::paginate(5);
        return view('offre.index',['offres'=>$offres]);
    }

    public function myOffres(){
        $recruteurId = auth()->user()->recruteur->id;
        $myOffres = OffreEmploi::where('recruteur_id',$recruteurId)->paginate(5);
        return view('recruteur.offre_emploi.liste-offre',compact('myOffres'));
    }

    public function create(){
        return view('recruteur.offre_emploi.create-offre');
    }

    public function store(Request $request){
        $data=$request->validate([
            'poste' => 'required|string',
            'description' => 'required|string|max:250',
            'exigence' => 'required|string|max:250',
            'salaire' => 'required|numeric',
            'date_fin_offre' => 'required|date',
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
        return view('recruteur.dashboard');
    }

    public function edit(OffreEmploi $offre){
        $recruteurId = auth()->user()->recruteur->id;
        if ($offre->recruteur_id !== $recruteurId) {
            abort(403, 'Unauthorized action.');
        }

        return view('recruteur.offre_emploi.update-offre',['offre'=>$offre]);
    }
    public function show(OffreEmploi $offre){
        return view('offre.job-detail',['offre'=>$offre]);
    }

    public function update(OffreEmploi $offre,Request $request){
        $data=$request->validate([
            'poste' => 'required|string',
            'description' => 'required|string|max:250',
            'exigence' => 'required|string|max:250',
            'salaire' => 'required|numeric',
            'date_fin_offre' => 'required|date',
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
