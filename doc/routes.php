
Route::post('players', [PlayersController::class, 'create']);
//Crea un jugador

Route::put('players/{id}', [PlayersController::class, 'edit']);
//Modifica el nombre de un jugador

Route::post('players/{id}/games', [GamesController::class, 'create']);
//Un jugador realiza una tirada

Route::delete('players/{id}/games', [GamesController::class, 'destroy']);
//Elimina las tiradas de un jugador

Route::get('players', [PlayersController::class, 'index']);
//Devuelve el listado de jugadores con el % de éxito

Route::get('players/{id}/games', [GamesController::class, 'index']);
//Devuelve el listado de jugadas de un jugador

Route::get('players/ranking', [RankingController::class, 'index']);
//Devuelve el ranking medio de todos los jugadores

Route::get('players/ranking/loser', [RankingController::class, 'loser']);
//Devuelve el jugador con el peor % de éxito

Route::get('players/ranking/winner', [RankingController::class, 'winner']);
//Devuelve el jugador con el mejor % de éxito


class Game extends Model
{
    use HasFactory;

    //Relacion uno a muchos (inversa)
    public function player(){
        return $this->belongsTo(Player::class, 'id');
    }
}