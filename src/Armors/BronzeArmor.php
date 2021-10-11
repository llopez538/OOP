<?php

namespace Styde\Armors;

use Styde\Armor;

class BronzeArmor implements Armor
{
    public function absorbDamage($damage) {
        return round($damage/2);
    }
}