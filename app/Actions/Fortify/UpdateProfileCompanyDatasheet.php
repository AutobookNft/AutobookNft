<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Contracts\UpdatesProfilesCompanyDatasheet;

class UpdateProfileCompanyDatasheet implements  UpdatesProfilesCompanyDatasheet
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {



        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'org_site_url' => ['nullable', 'URL'],
        ])->validateWithBag('updateProfileCompanyDatasheet');


        $user->forceFill([
            'first_name' => $input['first_name'],
            'rea' => $input['rea'],
            'org_fiscal_code' => $input['org_fiscal_code'],
            'org_vat_number' => $input['org_vat_number'],
            'org_street' => $input['org_street'],
            'org_city' => $input['org_city'],
            'org_region' => $input['org_region'],
            'org_zip' => $input['org_zip'],
            'org_state' => $input['org_state'],
            'org_site_url' => $input['org_site_url'],
            'annotation' => $input['annotation'],
            'org_phone_1' => $input['org_phone_1'],
            'org_phone_2' => $input['org_phone_2'],
            'org_phone_3' => $input['org_phone_3'],
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
