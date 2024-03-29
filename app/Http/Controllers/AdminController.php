<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\OffreEmploi;
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



}
