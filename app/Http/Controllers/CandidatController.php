<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Auth;
use Illuminate\Http\Request;

class CandidatController extends Controller
{

    public function create()
    {
        return view('candidat.create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'profession' => 'required|string|max:25',
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'tel' => 'required|string|max:20',
            'genre' => 'required|in:Homme,Femme',
            'date_naiss' => 'required|date',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $cvPath = $request->file('cv')->store('cv', 'public');


        // Create a new Candidat instance with the validated data
        Candidat::firstOrCreate(
            [
            'user_id' => auth()->user()->id,
            ],
            [
            'image' => $imagePath,
            'profession' => $data['profession'],
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'tel' => $data['tel'],
            'genre' => $data['genre'],
            'date_naiss' => $data['date_naiss'],
            'cv' => $cvPath,
            'verif' => null,
            ]
        );
        return redirect()->route('candidat.dashboard')->with('success', 'Candidat added successfully!');
    }
    public function editPrivacy(){
        return view('candidat.privacy');
    }
}
