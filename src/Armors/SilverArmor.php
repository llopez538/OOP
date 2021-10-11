<?php

namespace Styde\Armors;

use Styde\Armor;

class SilverArmor implements Armor
{
    public function absorbDamage($damage) {
        return round($damage/3);
    }
}