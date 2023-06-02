<?php

namespace App\Actions\Fortify;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UpdatesUserTaxData;
use Illuminate\Http\Request;

class UpdateUserTaxData implements UpdatesUserTaxData
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input, array $inputFront, array $inputRetro)
    {

        Validator::make($input, [
            'doc_expired_date' => ['nullable', 'date'],
            'photo_doc_front' => ['nullable', 'image', 'max:4096'],
            'photo_doc_retro' => ['nullable', 'image', 'max:4096'],
            ]);

        if (isset($inputFront['photo_doc_front'])) {
            $user->uploadPhotoDocFront($inputFront['photo_doc_front']);
        }

        if (isset($inputRetro['photo_doc_retro'])) {
            $user->uploadPhotoDocRetro($inputRetro['photo_doc_retro']);
        }

        $user->forceFill([

            'doc_typo'          => $input['doc_typo'],
            'doc_num'           => $input['doc_num'],
            'doc_issue_date'    => $input['doc_issue_date'],
            'doc_expired_date'  => $input['doc_expired_date'],
            'doc_issue_from'    => $input['doc_issue_from'],

            ])->save();

    }


    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
       //
    }

    /**
     */
    public function __construct() {
    }
}
