<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

use App\Traits\HasProfilePhoto;
use App\Traits\HasPhotoDocFront;
use App\Traits\HasPhotoDocRetro;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasPhotoDocFront;
    use HasPhotoDocRetro;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'creator', 'first_name', 'last_name', 'email', 'password', 'profile_photo_path', 'doc_issue_date', 'doc_expired_date', 'consent'
    ];

    public function isSuperAdmin()
    {
        return $this->usertype === 'Superadmin';
    }

    public function getConsentAttribute($value)
    {
        return $value == 0;
    }

    public function setConsentAttribute($value)
    {
        $this->attributes['consent'] = $value ? 1 : 0;
    }

    public function drops()
    {
        return $this->hasMany(Drop::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'photo_doc_front',
        'photo_doc_retro',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'epp_id');
    }

    public function user_teams()
    {
        return $this->hasMany(Team::class, 'user_id');
    }

    public function getCurrentEppAttribute()
    {
        return $this->currentTeam->epp;
    }

    public function bio_chapters()
    {
        return $this->hasMany(Biography_chapter::class, 'user_id');
    }

}
