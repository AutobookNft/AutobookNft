<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date_start',
        'date_end',
        'ongoing',
        'published',
        'ended'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
