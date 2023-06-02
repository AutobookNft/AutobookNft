<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'consent' => ['required', 'accepted'],
            'password' => $this->passwordRules(),
            

        ])->validate();

        $creatorToken = hash('sha256', $input['email'].time());
        \Log::info('Creator Token: ' . $creatorToken); // Aggiungi questa riga



        return DB::transaction(function () use ($input, $creatorToken ) {
            return tap(
                User::create
                (['first_name' => $input['first_name'],
                  'last_name' => $input['last_name'],
                  'email' => $input['email'],
                  'consent' => $input['consent'],
                  'creator' => $creatorToken,
                  'password' => Hash::make($input['password']),]
                ),

               
                function (User $user) {
                    $this->createTeam($user);

                    $this->createFolders($user);

                }
            );
        });

    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {

        $teamname = explode(' ', $user->first_name, 2)[0] . "_collection";
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => $teamname,
            'creator' => $user->creator,
            'personal_team' => true,
        ]));

        // Crea una sottocartella con il nome collections dentro la cartella image/ID appena creata
        Storage::disk('public')->makeDirectory('image/' . $user->id . '/collections' . '/' . $teamname);

    }

    /**
     * Crera la struttura delle cartelle per la gestione di tutte le immagini dello user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createFolders(User $user)
    {
       // Crea una cartella "image" nella cartella pubblica, se non esiste già
        Storage::disk('public')->makeDirectory('image');

        // Crea una sottocartella con il nome dell'ID dell'utente appena creato nella cartella "image"
        Storage::disk('public')->makeDirectory('image/' . $user->id);

        // Crea una sottocartella con il nome profiles dentro la cartella image/ID appena creata
        Storage::disk('public')->makeDirectory('image/' . $user->id . "/profiles") ;

        // Crea una sottocartella con il nome collections dentro la cartella image/ID appena creata
        Storage::disk('public')->makeDirectory('image/' . $user->id . "/collections");

        // Crea una sottocartella con il nome biographies dentro la cartella image/ID appena creata
        Storage::disk('public')->makeDirectory('image/' . $user->id . "/biographies");

    }

}
