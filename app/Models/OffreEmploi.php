<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OffreEmploi extends Model
{
    use HasFactory;
    protected $fillable=['recruteur_id','poste','description','exigence','salaire','date_fin_offre','lieu','verif'];

    public function candidatures(){
        return $this->hasMany(Candidature::class);
    }
    public function recruteur():BelongsTo
    {
        return $this->belongsTo(Recruteur::class,'recruteur_id', 'id');
    }
}
