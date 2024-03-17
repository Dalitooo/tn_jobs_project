<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;
    protected $fillable=['candidat_id','offre_emploi_id','result'];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
    public function offreEmploi()
    {
        return $this->belongsTo(OffreEmploi::class);
    }
}
