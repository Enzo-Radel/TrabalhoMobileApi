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
        'filme',
        'diretor',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function rules() {
        return [
            'filme'     => 'required|integer',
            'diretor'   => 'required|integer',
        ];
    }

    public static function messages() {
        return [
            'filme.required'    => 'É necessário informar o filme',
            'filme.integer'     => 'O campo filme precisa ser um inteiro',

            'diretor.required'    => 'É necessário informar o diretor',
            'diretor.integer'     => 'O campo diretor precisa ser um inteiro',
        ];
    }
}
