<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class likefoto extends Model
{
    use HasFactory;
    protected $table = 'likefotos';

    protected $fillable = 
    [
        'TanggalLike',
    ];

    public function like(): BelongsTo
    {
        return $this->belongsTo(foto::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
