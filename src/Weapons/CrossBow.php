<?php

namespace Styde\Weapons;

use Styde\Weapon;
use Styde\Unit;

class CrossBow extends Bow
{
    protected $damage = 40;

    public function getDescription(Unit $attaker, Unit $opponent)
    {
        return "{$attaker->getName()} ataca con la espada a {$opponent->getName()}";
    }
}