<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Candidature;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class CandidatController extends Controller
{
    public function nbrCandidaturesCandidat(string $id){
        $nbr = Candidature::where('candidat_id', $id)->count();
        return $nbr;
    }
    public function candidaturesAccepted(string $id){
        $nbr = Candidature::where('candidat_id', $id)
        ->where('result', '1')
        ->count();
        return $nbr;
    }

    public function search(Request $request){
        $searchTerm=$request->input('search');
        $candidats = Candidat::where('profession','like',"%$searchTerm%")
                            ->orWhere('prenom','like',"%$searchTerm%")
                            ->orWhere('nom','like',"%$searchTerm%")
                            ->orWhere('bio','like',"%$searchTerm%")
                            ->get();
        return view('candidat.candidat-search', ['candidats' => $candidats]);

    }

    public function dashboard()
    {
        $user = auth()->user();

        // Check if the user has a candidat profile
        if ($user->candidat) {
            $candidat_id = $user->candidat->id;
            $nbrCandidatures = $this->nbrCandidaturesCandidat($candidat_id);
            $nbrCandidaturesAccepted = $this->candidaturesAccepted($candidat_id);

            return view('candidat.dashboard', [
                'nbr' => $nbrCandidatures, // Corrected variable name
                'nbrAccepted' => $nbrCandidaturesAccepted // Corrected variable name
            ]);
        } else {
            session()->flash('message', 'You need to create your profile before accessing the Dashboard.');

            // Redirect the user to set up their candidat profile
            return redirect()->route('candidat.create');
        }
    }

    public function create()
    {
        $candidat = auth()->user()->candidat;
        if($candidat){
            return view('candidat.create', compact('candidat'));
        }else
        {
            return view('candidat.create');

        }
    }

    public function index(){
        $candidats=Candidat::paginate(5);
        return view('candidat.index',['candidats'=>$candidats]);
    }

    public function downloadCV(Candidat $candidat)
    {
        // Retrieve the path to the CV file
        $cvPath = $candidat->cv;

        // Check if the CV path exists
        if ($cvPath) {
            // Get the file name
            $fileName = basename($cvPath);

            // Generate the response for downloading the file
            return response()->download(storage_path('app/public/' . $cvPath), $fileName);
        } else {
            // If CV path doesn't exist, redirect back or handle as appropriate
            return redirect()->back()->with('error', 'CV not found.');
        }
    }

    public function show(Candidat $candidat){
        return view('candidat.candidat-details',['candidat'=>$candidat]);
    }

    public function store(Request $request){

        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'profession' => 'required|string|max:25',
            'bio' => 'required|string|max:250',
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'tel' => 'required|string|max:20',
            'genre' => 'required|in:Homme,Femme',
            'date_naiss' => 'required|date',
            'cv' => 'mimes:pdf,doc,docx|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

        }else{
            $candidat = auth()->user()->candidat;
            $imagePath=$candidat->image;
        }
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');

        }else{
            $candidat = auth()->user()->candidat;
            $cvPath=$candidat->cv;
        }


        // Create a new Candidat instance with the validated data
        Candidat::UpdateOrCreate(
            [
            'user_id' => auth()->user()->id,
            ],
            [
            'image' => $imagePath,
            'profession' => $data['profession'],
            'bio' => $data['bio'],
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
