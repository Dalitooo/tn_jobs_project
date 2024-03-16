<?php

namespace App\Http\Controllers;

use App\Models\Recruteur;
use Illuminate\Http\Request;

class RecruteurController extends Controller
{
    public function create(){
    $recruteur = auth()->user()->recruteur;

    if ($recruteur) {
        return view('recruteur.create', compact('recruteur'));
    } else {
        return view('recruteur.create');
    }
    }
    public function store(Request $request){
        $data=$request->validate([
            'logo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'nom_entreprise'=>'required|string|max:25',
            'adresse' => 'required|string|max:150',
            'tel' => 'required|string|max:20',

        ]);
        $logoPath = $request->file('logo')->store('images','public');
        Recruteur::UpdateOrCreate([
            'user_id'=>auth()->user()->id,
        ],
        [
            'logo'=>$logoPath,
            'nom'=>$data['nom'],
            'prenom'=>$data['prenom'],
            'nom_entreprise'=>$data['nom_entreprise'],
            'adresse'=>$data['adresse'],
            'tel'=>$data['tel'],
            'verif'=>null
        ]
        );
        return redirect()->route('recruteur.dashboard')->with('success', 'recruteur added successfully!');

        ;

    }
}