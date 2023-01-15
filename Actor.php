<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actors';

    protected $fillable = [
        'name', 'image', 'biography', 'character_name', 'popularity', 'birthday', 'place_of_birth',
    ];
}
