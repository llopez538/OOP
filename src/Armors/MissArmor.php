<?php

namespace Styde\Armors;

use Styde\Armor;

class MissArmor implements Armor
{
    public function absorbDamage($damage) {
        $bingo = rand(1, 10);
        
        if ($bingo == 1 || $bingo == 3 || $bingo == 7 || $bingo == 4 || $bingo == 10) {
            echo "Fallaste el ataque";
            return;
        }
        return round($damage);
    }
}