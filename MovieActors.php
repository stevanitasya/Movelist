<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieActors extends Model
{
    use HasFactory;

    protected $table = 'movieactors';

    protected $fillable = [
        'actors_id', 'movies_id'
    ];

    public function actors()
    {
        return $this->belongsTo(Actor::class, 'actors_id');
    }

    public function movies()
    {
        return $this->belongsTo(Movie::class, 'movies_id');
    }


    public function genre()
    {
        return $this->hasMany(MovieGenre::class);
    }

    public function watchList()
    {
        return $this->belongsTo(WatchList::class);
    }
}
