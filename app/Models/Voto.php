<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    protected $table = 'votos';

    protected $fillable = [
        'user_id',
        'filme_id',
        'diretor_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function filme() {
        return $this->belongsTo(Filme::class);
    }

    public function diretor() {
        return $this->belongsTo(Diretor::class);
    }
}
