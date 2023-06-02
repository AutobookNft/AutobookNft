<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_traits extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'teams_items_id'
    ];

    // public function teams_items()
    // {
    //     return $this->belongsTo(Teams_item::class);
    // }

}
