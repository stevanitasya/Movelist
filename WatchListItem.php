<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchListItem extends Model
{
    use HasFactory;

    public function watchList(){
        return $this->belongsTo(WatchList::class);
    }

    public function movies(){
        return $this->belongsTo(Movie::class);
    }
}
