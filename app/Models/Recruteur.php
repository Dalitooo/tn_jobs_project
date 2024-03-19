<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recruteur extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','bio','adresse','nom_entreprise','user_id','tel','logo','verif'];
    protected $casts = [
        'verif' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offreEmploi():HasMany{
        return $this->hasMany(OffreEmploi::class,'recruteur_id', 'id');
    }
}
