<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_utility extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'description',
        'creation_data',
        'teams_items_id'
    ];


    public function attachments()
    {
        return $this->hasMany(Utility_files::class);
    }


}
