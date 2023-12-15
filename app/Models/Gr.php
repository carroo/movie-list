<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gr extends Model
{
    use HasFactory;
    protected $fillable = [
        'genre'
    ];
    public function genre()
    {
        return $this->hasMany(Genre::class);
    }
}
