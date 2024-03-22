<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Candidature;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CandidatureController extends Controller
{
    public function myCandidaturesRecruteur(){
        $recruteurOffers = OffreEmploi::where('recruteur_id', auth()->user()->recruteur->id)->pluck('id');
        $recruteurCandidatures = Candidature::whereIn('offre_emploi_id', $recruteurOffers)->get();
        return view('candidature.list-candidatures-recruteur',['candidatures'=>$recruteurCandidatures]);
    }


    public function myCandidaturesCandidat(){
        $candidatCandidatures = Candidature::where('candidat_id',auth()->user()->candidat->id)->get();
        return view('candidature.list-candidatures-candidat',['candidatures'=>$candidatCandidatures]);
    }




    public function store(string $id){
        if(!auth()->check()) {
            throw ValidationException::withMessages(['Please login for apply to the job.']);
        }
        $alreadyApplied = Candidature::where(['offre_emploi_id' => $id,'candidat_id'=>auth()->user()->candidat->id])->exists();
        if($alreadyApplied) {
            throw ValidationException::withMessages(['You already applied to this job.']);
        }
        $applyJob = new Candidature();
        $applyJob->offre_emploi_id = $id;
        $applyJob->candidat_id = auth()->user()->candidat->id;
        $applyJob->result=null;
        $applyJob->save();
        return response(['message' => 'Applied Successfully!'], 200);
    }
    public function accepter(Candidature $candidature){
        $candidature->result= true;
        $candidature->save();
        return redirect(route('recruteur.candidatures'));
    }
    public function refuser(Candidature $candidature){
        $candidature->result= false;
        $candidature->save();
        return redirect(route('recruteur.candidatures'));
    }
}
