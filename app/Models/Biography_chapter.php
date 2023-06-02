<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography_chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_title',
        'chapter_biography',
        'chapter_bio_date_dal',
        'chapter_bio_date_al',
    ];

}
