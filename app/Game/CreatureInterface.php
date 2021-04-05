<?php

namespace App\Game;

interface CreatureInterface 
{
    public function getName(); 
    
    public function setHealth();
    
    public function setStrength();
    
    public function setDefence();
    
    public function setSpeed();
    
    public function setLuck();
}
