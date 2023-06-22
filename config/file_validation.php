<?php

/*

This configuration file contains the allowed types and maximum sizes
for various file types. The file types are organized by key, with the allowed
types and maximum size for each type stored in sub-arrays.
he keys and sub-array structures are as follows:

'images': allowed image types and maximum size
'ebooks': allowed ebook types and maximum size
'audio': allowed audio types and maximum size
'video': allowed video types and maximum size"

*/

return [
    'images' => [
        'allowed_types' => explode(',', env('ALLOWED_IMAGE_TYPES', 'jpg,jpeg,png,gif,bmp,tiff,svg,eps,psd,ai,cdr,webp')),
        'max_size' => 40960, // in KB
        'mime_types' => [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'tiff' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'eps' => 'image/x-eps',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai' => 'application/illustrator',
            'cdr' => 'application/cdr',
            'webp' => 'image/webp',
            ]
        ],

    'ebooks' => [
        'allowed_types' => explode(',', env('ALLOWED_EBOOK_TYPES', 'pdf,epub')),
        'max_size' => env('MAX_EBOOK_SIZE', 2048),
        'mime_types' => [
            '.pdf' => 'application/pdf',
            '.epub' => 'application/epub+zip',
            '.txt' => 'text/plain',
            ]
    ],

    'audio' => [
        'allowed_types' => explode(',', env('ALLOWED_AUDIO_TYPES', 'mp3,wav,m4a')),
        'max_size' => env('MAX_AUDIO_SIZE', 20480),
        'mime_types' => [
            '.mp3' => 'audio/mpeg',
            '.wav' => 'audio/x-wav',
            '.m4a' => 'audio/mp4',
        ]
    ],

    'video' => [
        'allowed_types' => explode(',', env('ALLOWED_VIDEO_TYPES', "mp4,mov,avi,mkv")),
        'max_size' => env('MAX_VIDEO_SIZE', 20480),
        'mime_types' => [
            '.mp4' => 'video/mp4',
            '.mov' => 'video/quicktime',
            '.avi' => 'video/x-msvideo',
            '.mkv' => 'video/x-matroska',
        ]
        // in KB
    ],


    'document' => [
    'allowed_types' => explode(',', env('ALLOWED_DOCUMENT_TYPES', "doc,docx,xls,xlsx,ppt,pptx,pdf,txt,rtf,odt,ods,odp,tml")),
    'max_size' => env('MAX_DOCUMENT_SIZE', 20480), // in KB
        'mime_types' => [
            '.doc' => 'application/msword',
            '.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            '.xls' => 'application/vnd.ms-excel',
            '.xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            '.ppt' => 'application/vnd.ms-powerpoint',
            '.pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            '.pdf' => 'application/pdf',
            '.txt' => 'text/plain',
            '.rtf' => 'application/rtf',
            '.odt' => 'application/vnd.oasis.opendocument.text',
            '.ods' => 'application/vnd.oasis.opendocument.spreadsheet',
            '.odp' => 'application/vnd.oasis.opendocument.presentation',
            '.html'=> 'text/html'

        ]
        // in KB
    ],
];


