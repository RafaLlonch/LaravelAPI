<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;

class GamesController extends Controller
{
    //Un jugador realiza una tirada
    public function create($id){

        if (auth()->user()->id != $id){
            return response()->json('No estas autorizado');
        }
        
        $user = User::find($id);

        $jugada = new Game();

        $jugada->user_id = $user->id;
        $jugada->dado1 = rand(1,7);
        $jugada->dado2 = rand(1,7);
        
        if ($jugada->dado1 + $jugada->dado2 == 7){
            $jugada->resultado = 'Ganada';
        }

        else { $jugada->resultado = 'Perdida';}

        $jugada->save();

        return response()->json($jugada);
    }

    //Elimina las tiradas de un jugador
    public function destroy($id){

        $partidas = Game::all()->where('user_id', $id);

        foreach ($partidas as $partida){
            $partida->delete();
        }

        return response()->json(['Partidas eliminadas', 200]);

    }

    //Devuelve el listado de jugadas de un jugador
    public function index($id){
        
        $partidas = Game::all()->where('user_id', $id);

        return response()->json(['Listado de partidas: ', $partidas]);
    }
}
