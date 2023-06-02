<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasImageAvatar;
use App\Traits\HasImageEconft;
use App\Traits\HasImageBanner;
use App\Traits\HasImageCard;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

use Laravel\Jetstream\Team as JetstreamTeam;

class Team extends JetstreamTeam
{
    use HasFactory;
    use HasImageEconft;
    use HasImageBanner;
    use HasImageAvatar;
    use HasImageCard;
    use Notifiable;

    public function teams_item()
    {
        return $this->hasMany(Teams_item::class);
    }

    public function attachment_files()
    {
        return $this->hasMany(Team_utility_files::class, 'team_util_id');
    }

    public function teams_wallet()
    {
        return $this->hasMany(Team_wallet::class);
    }

    public function epp()
    {
        return $this->hasOne(User::class, 'id', 'epp_id')->where('usertype', 'epp');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'personal_team' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'personal_team',
        'collection_name',
        'description',
        'epp_id',
        'eco_asset_nft_id',
        'url_collection_site',
        'type',
        'position',
        'show',
        'token',
        'owner_id',
        'wallet_frangette',
        'wallet_epp',
        'mint_frangette',
        'mint_epp',
        'royalty_frangette',
        'royalty_epp',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
        'updated' => TeamUpdated::class,
        'deleted' => TeamDeleted::class,
    ];

//         /**
//      * The accessors to append to the model's array form.
//      *
//      * @var array
//      */
    protected $appends = [
        'path_econft',
        'path_banner',
        'path_avatar',
        'path_card',
    ];

}
