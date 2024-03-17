<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable=['image','profession','bio','nom','prenom','user_id','tel', 'genre', 'date_naiss', 'cv', 'verif'];

    protected $casts = [
        'verif' => 'boolean',
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
