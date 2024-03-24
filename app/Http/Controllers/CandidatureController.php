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
        $offre=OffreEmploi::find($id);
        if(!auth()->check()) {
            throw ValidationException::withMessages(['Please login for apply to the job.']);
        }
        $alreadyApplied = Candidature::where(['offre_emploi_id' => $id,'candidat_id'=>auth()->user()->candidat->id])->exists();
        if($alreadyApplied) {
            return redirect(route('offre.show',['offre'=>$offre]))->with('alreadyApplied', 'You Already Applied To This Job');;
        }
        $verif=auth()->user()->candidat->verif==1;
        if(!$verif){
            return redirect(route('offre.show',['offre'=>$offre]))->with('notVerified', 'Profile Not Verified Yet');;
        }
        $applyJob = new Candidature();
        $applyJob->offre_emploi_id = $id;
        $applyJob->candidat_id = auth()->user()->candidat->id;
        $applyJob->result=null;
        $applyJob->save();
        return redirect(route('offre.show',['offre'=>$offre]))->with('success', 'Applied Succesffully');;

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
