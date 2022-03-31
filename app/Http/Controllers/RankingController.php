<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;

class RankingController extends Controller
{
    //Devuelve el ranking medio de todos los jugadores
    public function index(){

        $partidas = Game::all();
        $total = 0;
        $ganadas = 0;

        foreach ($partidas as $partida){
            if ($partida->resultado == 'Ganada'){
                $ganadas++;
            }
            $total++;
        }

        $ranking = round($ganadas/$total*100);
        $message = "Ranking medio de todos los jugadores = ".$ranking."%";

        return response([$message, 200]);
    }

    //Devuelve el jugador con el peor % de éxito
    public function loser(){

        $users = User::all();
        
        foreach ($users as $user){

            $ganadas = 0;
            $total = 0;
            
            foreach ($user->partidas as $partida){
                if ($partida->resultado == 'Ganada'){
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

            $loser[] = array($percent, $user->id);
        }

        $minimo = min($loser);
        $idloser = $minimo[1];

        return response()->json(['Jugador con el id: ',$idloser, 200]);
    }

    //Devuelve el jugador con el mejor % de éxito
    public function winner(){

        $users = User::all();
        
        foreach ($users as $user){
            
            $ganadas = 0;
            $total = 0;

            foreach ($user->partidas as $partida){
                if ($partida->resultado == 'Ganada'){
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

            $winner[] = [$percent, $user->id];
        }

        $maximo = max($winner);
        $idwinner = $maximo[1];

        return response()->json(['Jugador con el id: ',$idwinner, 200]);
    }
}
