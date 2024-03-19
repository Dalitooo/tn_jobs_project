<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function myOffres(){
        $myOffres = OffreEmploi::where('recruteur_id', auth()->user()->id)->paginate(3);
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
        return view('recruteur.offre_emploi.update-offre',['offre'=>$offre]);
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
        return redirect(route('recruteur.offre.index'))->with('success', 'Offre deleted Succesffully');

    }

}
