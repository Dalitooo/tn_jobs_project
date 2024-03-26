<?php

namespace App\Http\Controllers;

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

    public function acceptOffer($id) {
        $offer=OffreEmploi::where('id',$id)->first();
        $offer->verif = true;
        $offer->save();
        return redirect()->route('admin.offers.pending');
    }

    public function refuseOffer($id) {
        $offer=OffreEmploi::where('id',$id)->first();
        $offer->verif = false;
        $offer->save();
        return redirect()->route('admin.offers.pending');
    }


}
