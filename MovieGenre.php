<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;
    // public function moviegenre(){
    //     return $this->belongsTo(Movie::class);
    // }

    protected $table = 'moviegenre';

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
