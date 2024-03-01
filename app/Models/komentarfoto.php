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

    public function foto(): BelongsTo
    {
        return $this->belongsTo(foto::class,'foto_id','id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
