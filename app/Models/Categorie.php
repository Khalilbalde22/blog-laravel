<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'description'
    ];

    public function categories():HasMany{
        return $this->hasMany(Article::class);
    }
}

