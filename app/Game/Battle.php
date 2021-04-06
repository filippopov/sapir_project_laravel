<?php

namespace App\Game;

class Battle 
{
    const NUMBERR_OF_TURNS = 20;

    public function fight(CreatureInterface $player, CreatureInterface $monster)
    {
        $result = [];
        $creatures = $this->setFirstCreature($player, $monster);
        
        $roundData = [];
        $winner = '';
        
        for ($i = 1; $i <= self::NUMBERR_OF_TURNS; $i++){
            /**
             * @var CreatureInterface $firstCreature
             */
            $firstCreature = isset($creatures[0]) ? $creatures[0] : null;
            
            /**
             * @var CreatureInterface $secondCreature
             */
            $secondCreature = isset($creatures[1]) ? $creatures[1] : null;

            $dataAfterAttack = $firstCreature->setDamage($secondCreature);
            $damage = isset($dataAfterAttack['damage']) ? $dataAfterAttack['damage'] : 0;
            $usedSkill = isset($dataAfterAttack['usedSkill']) ? $dataAfterAttack['usedSkill'] : '';
            
            $isAlive = $secondCreature->isAlive() ? 'true' : 'false';
            
            $roundData[$i]['text1'] = $firstCreature->getName() . ' hit ' . $secondCreature->getName() . ' with damage: ' . $damage . ' health for ' . $secondCreature->getName() . ' (' . $secondCreature->getHealth() . ') is alive: ' . $isAlive . ', used skill: ' . $usedSkill; 
            
            if (!$secondCreature->isAlive()){
                $winner = $firstCreature->getName();
                break;
            }
            
            $dataAfterAttack = $secondCreature->setDamage($firstCreature);
            $damage = isset($dataAfterAttack['damage']) ? $dataAfterAttack['damage'] : 0;
            $usedSkill = isset($dataAfterAttack['usedSkill']) ? $dataAfterAttack['usedSkill'] : '';
            
            $isAlive = $firstCreature->isAlive() ? 'true' : 'false';

            $roundData[$i]['text2'] = $secondCreature->getName() . ' hit ' . $firstCreature->getName() . ' with damage: ' . $damage . ' health for ' . $firstCreature->getName() . ' (' . $firstCreature->getHealth() . ') is alive: ' . $isAlive . ', used skill: ' . $usedSkill;
            
            if (!$firstCreature->isAlive()){
                $winner = $secondCreature->getName();
                break;
            }
        }
        
        $result['roundData'] = $roundData;
        $result['winner'] = $winner;
        
        return $result;
    }
    
    private function setFirstCreature(CreatureInterface $player, CreatureInterface $monster)
    {
        $result = [];
        
        if ($player->getSpeed() > $monster->getSpeed()){
            $result[] = $player;
            $result[] = $monster;
        } elseif ($player->getSpeed() < $monster->getSpeed()){
            $result[] = $monster;
            $result[] = $player;
        } else {
            if ($player->getLuck() > $monster->getLuck()){
                $result[] = $player;
                $result[] = $monster;
            } else {
                $result[] = $monster;
                $result[] = $player;
            }
        }
        
        return $result;
    }
}
