<?php

namespace App\Util;
use Illuminate\Support\Facades\DB;

class FileHelper
{
    public static function getAcceptedFileTypes($type)
    {
        $config = config('file_validation');

        $allowedTypes = $config[$type]['allowed_types'];

        $mimeTypes = $config[$type]['mime_types'];

        $result = [];

        foreach ($allowedTypes as $allowedType) {
            array_push($result, $mimeTypes[$allowedType]);
        }

        //dd($result);

        return implode(',', $result);
    }

    public static function generate_position_number($team_id)
    {
        $records = DB::table('teams_items')->where('team_id', $team_id)->get();
        $positions = array_column($records->toArray(), 'position');

        //dd($team_id);

        if ($positions) {

            $max_position = max($positions);

        }else{

            $max_position = 0;
        }
        return $max_position + 1;

    }

    public static function fileAccepted($file)
    {

        $maxdimention = config('AllowedFileType.collection.max_size');

        //dd($file->getSize(), $maxdimention);

        if ($file->getSize() > $maxdimention) {
            return false;
        }

        $allowedTypes = config('AllowedFileType.collection.allowed');
        $extension = $file->getClientOriginalExtension();

       // dd(var_dump($allowedTypes), $extension);

        if (array_key_exists($extension, $allowedTypes)) {
            $value = $allowedTypes[$extension];
        } else {
            $value = false;
        }

        return $value;
    }

}
