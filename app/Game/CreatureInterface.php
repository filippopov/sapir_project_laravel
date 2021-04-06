<?php

namespace App\Game;

interface CreatureInterface 
{
    public function getName(); 
    
    public function setNewHealth(int $newHealth);

    public function getHealth();
    
    public function getStrength();
    
    public function getDefence();
    
    public function getSpeed();
    
    public function getLuck();
    
    public function setDamage(CreatureInterface $creature);
    
    public function isAlive();
    
    public function getRapidSkill();

    public function getMagicShieldSkill();
}
