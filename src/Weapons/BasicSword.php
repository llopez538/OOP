<?php

namespace Styde\Weapons;

use Styde\Weapon;
use Styde\Unit;

class BasicSword extends Weapon
{
    protected $damage = 40;

    public function getDescription(Unit $attaker, Unit $opponent)
    {
        return "{$attaker->getName()} dispara una flecha {$opponent->getName()}";
    }
}