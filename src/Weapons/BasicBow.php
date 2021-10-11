<?php

namespace Styde\Weapons;

use Styde\Weapon\Bow;
use Styde\Unit;

class BasicBow extends Bow
{
    protected $damage = 20;

    public function getDescription(Unit $attaker, Unit $opponent)
    {
        return "{$attaker->getName()} ataca con la espada a {$opponent->getName()}";
    }
}