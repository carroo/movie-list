<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'gr_id',
    ];
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function gr()
    {
        return $this->belongsTo(Gr::class);
    }
}
