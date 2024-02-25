<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $primaryKey = 'album_id';

    protected $fillable = [
        'user_id',
        'namaalbum',
        'coverimage',
        'deskripsi',
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
