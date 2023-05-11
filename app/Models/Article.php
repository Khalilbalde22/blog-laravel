<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'titre',
        'reference',
        'description',
        'image',
        'categorie_id',
        'auteur',
    ];

    public function categories():BelongsTo{
        return $this->belongsTo(Categorie::class, 'Categorie');
    }

    public function getSlug(): string {
        return Str::slug($this->titre);
    }

    // public function scopeRecent(Builder $builder):Builder {
    //     return $builder->orderBy('created_at', 'desc');
    // }

    public function imageUrl():string {
        return Storage::url($this->image);
    }
}
