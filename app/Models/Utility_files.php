<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility_files extends Model
{
    protected $foreignKey = 'item_id';
    // ...

    use HasFactory;
  

}
