<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class komentarfoto extends Model
{
    use HasFactory;
    protected $table ='komentarfotos';
    protected $fillable = 
    [
        'isikomentar'
    ];

    public function komentar(): BelongsTo
    {
        return $this->belongsTo(foto::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
