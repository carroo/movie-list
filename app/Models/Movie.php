<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'director',
        'release_date',
        'thumbnail',
        'background',
    ];
    public function character()
    {
        return $this->hasMany(Character::class);
    }
    public function genre()
    {
        return $this->hasMany(Genre::class);
    }
    public function watch_list()
    {
        return $this->hasMany(WatchList::class);
    }
}
