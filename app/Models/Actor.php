<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'biography',
        'dob',
        'pob',
        'image',
        'popularity'
    ];
    public function character()
    {
        return $this->hasMany(Character::class);
    }
}
