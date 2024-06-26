<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
    use HasFactory;
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
