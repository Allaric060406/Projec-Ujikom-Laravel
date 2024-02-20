<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class foto extends Model
{
    use HasFactory;
    protected $table ='fotos';
    protected $primarykey = 'foto_id';
    
    protected $fillable =
    [
        'user_id',
        'album_id',
        'judulfoto',
        'imagefile',
        'deskripsifoto',
        'lokasifoto'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function album(): HasMany
    {
        return $this->hasMany(foto::class);
    }

    public function komentar(): HasMany
    {
        return $this->hasMany(komentarfoto::class);
    }

    public function like(): HasMany
    {
        return $this->hasMany(likefoto::class);
    }
}
