<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchList extends Model
{
    use HasFactory;

    public function watchlistItem(){
        return $this->hasMany(WatchListItem::class);
    }
}
