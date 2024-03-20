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

    public function index(){
        $recruteurs = Recruteur::paginate(9);
        return view('recruteur.index',['recruteurs'=>$recruteurs]);
    }

    public function show(Recruteur $recruteur){
        return view('recruteur.recruteur-details',['recruteur'=>$recruteur]);
    }

    public function store(Request $request){

        $data=$request->validate([
            'logo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:25',
            'bio' => 'required|string|max:250',
            'prenom' => 'required|string|max:25',
            'nom_entreprise'=>'required|string|max:25',
            'adresse' => 'required|string|max:150',
            'tel' => 'required|string|max:20',

        ]);

        $existingRecruteur = auth()->user()->recruteur;
        // Check if a new logo file is uploaded
        if ($request->hasFile('logo')) {
            // Store the new logo file
            $logoPath = $request->file('logo')->store('images','public');
        } else {
            // If no new logo file is uploaded, keep the existing logo path
            $recruteur = auth()->user()->recruteur;
            $logoPath=$recruteur->logo;
        }

        Recruteur::UpdateOrCreate([
            'user_id'=>auth()->user()->id,
        ],
        [
            'logo'=>$logoPath,
            'nom'=>$data['nom'],
            'prenom'=>$data['prenom'],
            'bio'=>$data['bio'],
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
