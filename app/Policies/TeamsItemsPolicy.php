<?php

namespace App\Policies;

use App\Models\Teams_item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamsItemsPolicy
{
    use HandlesAuthorization;


    public function update(User $user, Teams_item $teams_items)
    {
        return $user->can('update-teams_items');
    }






}
