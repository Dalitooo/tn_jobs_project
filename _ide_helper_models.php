<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $profession
 * @property string $nom
 * @property string $prenom
 * @property string $image
 * @property string $tel
 * @property string $genre
 * @property string $date_naiss
 * @property string $cv
 * @property bool|null $verif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereDateNaiss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereVerif($value)
 */
	class Candidat extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $nom
 * @property string $prenom
 * @property string $nom_entreprise
 * @property string $adresse
 * @property string $tel
 * @property string $logo
 * @property bool|null $verif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereNomEntreprise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruteur whereVerif($value)
 */
	class Recruteur extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $role
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Candidat|null $candidat
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Recruteur|null $recruteur
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

