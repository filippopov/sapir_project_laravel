<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game\Player;
use App\Game\WildBeasts;
use App\Game\Battle;

class GameController extends Controller
{
    public function index()
    {
        $playerName = 'Vaderus';
        
        $territories = ['Alleop'];
        
        return view('game.index', ['playerName' => $playerName, 'territories' => $territories]);
    }
    
    public function territory($territory, Player $player, WildBeasts $wildBeasts, Battle $battle)
    {
        $battleData = [];
        $battleData['playerHealth'] = $player->getHealth();
        $battleData['wildBeastsHealth'] = $wildBeasts->getHealth();
        
        $result = $battle->fight($player, $wildBeasts);

        $battleData['roundData'] = $result['roundData'];
        $battleData['winner'] = $result['winner'];
        $battleData['player'] = $player;
        $battleData['wildBeasts'] = $wildBeasts;

        return view('game.territory', $battleData);
    }
}
