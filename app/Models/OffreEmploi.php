<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreEmploi extends Model
{
    use HasFactory;
    protected $fillable=['poste','description','exigence','salaire','date_fin_offre','lieu','valid'];
    
    public function candidatures(){
        return $this->hasMany(Candidature::class);
    }
}
