<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;

class PlayersController extends Controller
{
    //Modifica el nombre de un jugador
    public function edit(Request $request, $id){

        if (auth()->user()->id != $id){
            return response()->json('No estas autorizado');
        }
        
        $user = User::find($id);
        
        $user->nickname = $request->nickname;

        $user->save();

        return response()->json([$user, 'Nombre de usuario actualizado']);
    }

    //Devuelve el listado de jugadores con el % de éxito
    public function index(){

        $jugadores = User::all();
        
        foreach ($jugadores as $jugador){

            $ganadas = 0;
            $total = 0;
            $partidas = Game::all()->where('user_id', $jugador->id);

            foreach ($partidas as $partida){
                if ($partida->resultado === 'Ganada'){
                    $ganadas++;
                }
                $total++;              
            }
            if ($total == 0){
                $percent = 0;
            }
            else{
                $percent = round($ganadas/$total*100);
            }
            $jugador['Porcentage de victoria'] = $percent.'%';   
        }

        return response()->json($jugadores);
    }
}
