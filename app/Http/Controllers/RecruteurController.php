<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use App\Models\Recruteur;
use Illuminate\Http\Request;

class RecruteurController extends Controller
{

    public function search(Request $request){
        $searchTerm=$request->input('search');
        $recruteurs = Recruteur::where('nom_entreprise','like',"%$searchTerm%")
                            ->orWhere('adresse','like',"%$searchTerm%")
                            ->orWhere('bio','like',"%$searchTerm%")
                            ->orWhere('nom','like',"%$searchTerm%")
                            ->orWhere('prenom','like',"%$searchTerm%")
                            ->paginate(5);
        return view('recruteur.recruteur-search', ['recruteurs' => $recruteurs]);
    }

    public function mesOffres(string $id){
        $recruteurOffers = OffreEmploi::where('recruteur_id', $id)->pluck('id');
        $nbrCandidatures = Candidature::whereIn('offre_emploi_id', $recruteurOffers)->count();
        return $nbrCandidatures;

    }
    public function mesCandidaturesValide(string $id){
        $recruteurOffers = OffreEmploi::where('recruteur_id', $id)->pluck('id');
        $nbrCandidaturesValide = Candidature::whereIn('offre_emploi_id', $recruteurOffers)->where('result',1)->count();
        return $nbrCandidaturesValide;

    }

    public function dashboardd(){
        $recruteur_id=auth()->user()->recruteur->id;
        $nbrCandidatures=$this->mesOffres($recruteur_id);
        $nbrCandidaturesValide= $this->mesCandidaturesValide($recruteur_id);
        return view('recruteur.dashboard',
        ['nbrCandidatures'=>$nbrCandidatures,
         'nbrCandidaturesValide'=>$nbrCandidaturesValide
        ]
        );
    }

    public function dashboard(){
        $user = auth()->user();

        // Check if the user has a recruteur profile
        if ($user->recruteur) {
            $recruteur_id = $user->recruteur->id;
            $nbrCandidatures = $this->mesOffres($recruteur_id);
            $nbrCandidaturesValide = $this->mesCandidaturesValide($recruteur_id);

            return view('recruteur.dashboard', [
                'nbrCandidatures' => $nbrCandidatures,
                'nbrCandidaturesValide' => $nbrCandidaturesValide
            ]);
        } else {
            session()->flash('message', 'Vous devez créer votre profil avant d\'accéder au Dashboard.');

            // Redirect the user to set up their recruteur profile
            return redirect()->route('recruteur.create');
        }
    }

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
