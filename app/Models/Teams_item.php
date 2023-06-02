<?php

namespace App\Models;

use App\Traits\HasImageItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Request;

class Teams_item extends Model
{
    use HasFactory;
    use HasImageItem;


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'item',
    ];

    protected $fillable =[
        'webp', 'webp_filename', 'drop_id'
    ];

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }

    public function attachment_files()
    {
        return $this->hasMany(Utility_files::class, 'item_id');
    }

    // public function items_traits()
    // {
    //     return $this->hasMany(Item_traits::class);
    // }

}
