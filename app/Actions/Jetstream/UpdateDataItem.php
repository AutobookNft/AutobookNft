<?php

namespace App\Actions\Jetstream;

use App\Contracts\UpdatesDataItem;
use App\Models\Teams_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


class UpdateDataItem implements UpdatesDataItem
{
    /**
     * Validate and update the given team's name.
     *
     * @param  string $fileCover
     * @param  string $fileMedia
     * @param  mixed  $teamItem
     * @param  array  $input
     * @return void
     */
    public function update($teamItem, array $input, $fileCover, $itemIdBeingRemoved)
    {

        //Gate::forUser(Auth::user())->authorize('update', $team);

        // if ($teamItem->type='audio'){
        //     $fileToFileHash = $fileMedia;
        // }else{
        //     $fileToFileHash = $fileCover;
        // }

        Validator::make($input, [
            'description'           => ['nullable'],
            'title'                 => ['nullable', 'string', 'max:255'],
            'price'                 => ['nullable', 'numeric'],
            'creation_date'         => ['nullable', 'date'],
            'position'              => ['nullable', 'numeric'],


            ])->validateWithBag('updateDataItem');


        $teamItem->forceFill([

            'description'   => $input['description'],
            'title'         => $input['title'],
            'price'         => $input['price'],
            'creation_date' => $input['creation_date'],
            'show'          => $input['show'],
            'position'      => $input['position'],
            'file_cover'    => $fileCover,
            'paired'        => $itemIdBeingRemoved,

        ])->save();

        $item = Teams_item::find($itemIdBeingRemoved);
        if (isset($item)) {
            $item->bind = true;
            $item->save();
        }

    }

}
