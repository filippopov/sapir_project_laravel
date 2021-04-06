<?php

namespace App\Game;

class WildBeasts implements CreatureInterface
{
    const MIN_HELTH = 60;
    const MAX_HEALTH = 90;
    const MIN_STRENGTH = 60;
    const MAX_STRENGTH = 90;
    const MIN_DEFENCE = 40;
    const MAX_DEFENCE = 60;
    const MIN_SPEED = 40;
    const MAX_SPEED = 60;
    const MIN_LUCK = 25;
    const MAX_LUCK = 40;
    const RAPID_SKILL = 0;
    const MAGIC_SHIELD_SKILL = 0;
    
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
        $this->setRapidSkill();
        $this->setMagicShieldSkill();
    }

    public function getName()
    {
        return $this->name;
    }
  
    public function getHealth()
    {
        return $this->health;
    }
    
    public function getStrength()
    {
        return $this->strength;
    }
    
    public function getDefence()
    {
        return $this->defence;
    }
    
    public function getSpeed()
    {
        return $this->speed;
    }
    
    public function getLuck()
    {
        return $this->luck;
    }
        
    public function setDamage(CreatureInterface $creature)
    {
        $usedSkill = '';
        $damage = $this->strength - $creature->getDefence();
        
        if ($creature->getMagicShieldSkill()){
            $chance = rand(1, 10);
            
            if ($chance <= $creature->getMagicShieldSkill()) {
                $rapidSkillDamage = $this->getStrength() - $creature->getDefence();
                $newHealth = $creature->getHealth() - $rapidSkillDamage;
                $creature->setNewHealth($newHealth);
                
                $usedSkill = 'Magic Shield Skill was activated';
                
                $damage = (int) $damage / 2;
            }
        }

        $newHealth = $creature->getHealth() - $damage;
        $creature->setNewHealth($newHealth);
        
        return ['damage' => $damage, 'usedSkill' => $usedSkill];
    }
    
    public function isAlive() : bool
    {
        return $this->health > 0;
    }
    
    public function setNewHealth(int $newHealth)
    {
        $this->health = $newHealth;
    }
    
    private function setRapidSkill()
    {
        $this->rapidSkill = self::RAPID_SKILL;
    }

    private function setMagicShieldSkill()
    {
        $this->magicShieldSkill = self::MAGIC_SHIELD_SKILL;
    }
         
    private function setHealth()
    {
        $this->health = rand(self::MIN_HELTH, self::MAX_HEALTH);
    }
    
    private function setStrength()
    {
        $this->strength = rand(self::MIN_STRENGTH, self::MAX_STRENGTH);
    }
    
    private function setDefence()
    {
        $this->defence = rand(self::MIN_DEFENCE, self::MAX_DEFENCE);
    }
    
    private function setSpeed()
    {
        $this->speed = rand(self::MIN_SPEED, self::MAX_SPEED);
    }
    
    private function setLuck()
    {
        $this->luck = rand(self::MIN_LUCK, self::MAX_LUCK);
    }
    
    public function getRapidSkill()
    {
        return $this->rapidSkill;
    }
    
    public function getMagicShieldSkill()
    {
        return $this->magicShieldSkill;
    }
}
