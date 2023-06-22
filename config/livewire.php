<?php

/*
|--------------------------------------------------------------------------
| Livewire Temporary File Uploads
|--------------------------------------------------------------------------
|
| Livewire now comes with the ability to temporarily store file uploads
| on the server while the form is being filled out.
|
*/
return [
    'temporary_file_upload' => [
        'rules' => ['file', 'max:40960'], // aggiungi 'max' con il valore in KB
        'maxFileSize' => 40960 // aggiungi questo valore in KB
    ],
];



