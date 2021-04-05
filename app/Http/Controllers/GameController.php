<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game\Player;
use App\Game\WildBeasts;

class GameController extends Controller
{
    public function index()
    {
        $playerName = 'Vaderus';
        
        $territories = ['Alleop'];
        
        return view('game.index', ['playerName' => $playerName, 'territories' => $territories]);
    }
    
    public function territory($territory, Player $player, WildBeasts $wildBeasts)
    {
        dd($territory, $player, $wildBeasts);
    }
}
