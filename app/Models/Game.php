<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['dado1','dado2','resultado','user_id'];

    //Relacion uno a muchos (inversa)
    public function jugador(){
        return $this->belongsTo(User::class, 'id');
    }
}
