<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\OffreEmploi;
use App\Models\Recruteur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pendingOffers(){
        $pendingOffers=OffreEmploi::where('verif',null)->paginate(5);
        return view('admin.pending-offers',['offers'=>$pendingOffers]);
    }

    public function validOffers(){
        $validOffers=OffreEmploi::where('verif',1)->paginate(10);
        return view('admin.valid-offers',['offers'=>$validOffers]);
    }

    public function rejectedOffers(){
        $rejectedOffers=OffreEmploi::where('verif',0)->paginate(10);
        return view('admin.rejected-offers',['offers'=>$rejectedOffers]);
    }
    public function offerDetails(OffreEmploi $offer){
        return view('admin.details-offer',['offer'=>$offer]);
    }

    public function acceptOffer($id) {
        $offer=OffreEmploi::where('id',$id)->first();
        $offer->verif = true;
        $offer->save();
        return redirect()->route('admin.offers.pending')->with('success','offer accepter');
    }

    public function refuseOffer($id) {
        $offer=OffreEmploi::where('id',$id)->first();
        $offer->verif = false;
        $offer->save();
        return redirect()->route('admin.offers.pending')->with('success','offer refuser');;
    }


    public function pendingCandidats(){
        $candidats=Candidat::where('verif',null)->paginate(5);
        return view('admin.candidats.pending-candidats',['candidats'=>$candidats]);
    }
    public function validCandidats(){
        $candidats=Candidat::where('verif',1)->paginate(5);
        return view('admin.candidats.valid-candidats',['candidats'=>$candidats]);
    }

    public function rejectedCandidats(){
        $candidats=Candidat::where('verif',0)->paginate(5);
        return view('admin.candidats.rejected-candidats',['candidats'=>$candidats]);
    }

    public function acceptCandidat($id){
        $candidat=Candidat::where('id',$id)->first();
        $candidat->verif=true;
        $candidat->save();
        return redirect()->route('admin.candidats.pending')->with('success','candidat accepted');
    }

    public function refuseCandidat($id){
        $candidat=Candidat::where('id',$id)->first();
        $candidat->verif=false;
        $candidat->save();
        return redirect()->route('admin.candidats.pending')->with('success','candidat refused');
    }

    public function candidatDetails(Candidat $candidat){
        return view('admin.candidats.details-candidat',['candidat'=>$candidat]);
    }

    public function pendingRecruteurs(){
        $recruteurs=Recruteur::where('verif',null)->paginate(5);
        return view('admin.recruteurs.pending-recruteurs',['recruteurs'=>$recruteurs]);
    }
    public function validRecruteurs(){
        $recruteurs=Recruteur::where('verif',1)->paginate(5);
        return view('admin.recruteurs.valid-recruteurs',['recruteurs'=>$recruteurs]);
    }

    public function rejectedRecruteurs(){
        $recruteurs=Recruteur::where('verif',0)->paginate(5);
        return view('admin.recruteurs.rejected-recruteurs',['recruteurs'=>$recruteurs]);
    }

    public function acceptRecruteur($id){
        $recruteur=Recruteur::where('id',$id)->first();
        $recruteur->verif=true;
        $recruteur->save();
        return redirect()->route('admin.recruteurs.pending')->with('success','recruteur accepted');
    }

    public function refuseRecruteur($id){
        $recruteur=Recruteur::where('id',$id)->first();
        $recruteur->verif=false;
        $recruteur->save();
        return redirect()->route('admin.recruteurs.pending')->with('success','recruteur refused');
    }

    public function recruteurDetails(Recruteur $recruteur){
        return view('admin.recruteurs.details-recruteur',['recruteur'=>$recruteur]);
    }


    public function dashboard()
    {
        $totalCandidat = Candidat::count();
        $totalRecruteur = Recruteur::count();
        $totalOffre = OffreEmploi::count();
        return view('admin.dashboard', compact('totalCandidat', 'totalRecruteur', 'totalOffre'));
    }


}
