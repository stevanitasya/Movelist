<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    public function moviegenre(){
        return $this->hasMany(MovieGenre::class, 'movies_id');
    }

    public function watchList(){
        return $this->belongsTo(WatchList::class);
    }

    public function movieactor(){
        return $this->hasMany(MovieActors::class, 'movies_id');
    }
}
