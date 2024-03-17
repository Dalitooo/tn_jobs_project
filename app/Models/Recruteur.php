<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
