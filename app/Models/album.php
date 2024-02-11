<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $primarykey = 'album_id';

    protected $fillable = [
        'namaalbum',
        'deskiripsi',
        'tanggaldibuat'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function foto(): HasMany
    {
        return $this->hasMany(foto::class);
    }
}
