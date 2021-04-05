<?php

namespace App\Game;

class Player implements CreatureInterface
{
    const MIN_HELTH = 70;
    const MAX_HEALTH = 100;
    const MIN_STRENGTH = 70;
    const MAX_STRENGTH = 100;
    const MIN_DEFENCE = 45;
    const MAX_DEFENCE = 55;
    const MIN_SPEED = 40;
    const MAX_SPEED = 50;
    const MIN_LUCK = 10;
    const MAX_LUCK = 30;
    
    private $name;
    
    private $health;
    
    private $strength;
    
    private $defence;
    
    private $speed;
    
    private $luck;
    
    public function __construct(string $name) 
    {
        $this->name = $name;
        $this->setHealth();
        $this->setStrength();
        $this->setDefence();
        $this->setSpeed();
        $this->setLuck();
    }

    public function getName()
    {
        return $name;
    }
    
    public function setHealth()
    {
        $this->health = rand(self::MIN_HELTH, self::MAX_HEALTH);
    }
    
    public function setStrength()
    {
        $this->strength = rand(self::MIN_STRENGTH, self::MAX_STRENGTH);
    }
    
    public function setDefence()
    {
        $this->defence = rand(self::MIN_DEFENCE, self::MAX_DEFENCE);
    }
    
    public function setSpeed()
    {
        $this->speed = rand(self::MIN_SPEED, self::MAX_SPEED);
    }
    
    public function setLuck()
    {
        $this->luck = rand(self::MIN_LUCK, self::MAX_LUCK);
    }
}
