<?php

namespace Styde;

use Styde\Weapon;
use Exception;

abstract class Unit
{
    protected $hp = 40;
    protected $name;
    protected $armor;
    protected $weapon;

    public function __construct($name, Weapon $weapon = null)
    {
        $this->name = $name;
        $this->weapon = $weapon;
    }

    public function setWeapon(Weapon $weapon)
    {
        $this->weapon = $weapon;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function setArmor(Armor $armor = null)
    {
        $this->armor = $armor;
    }

    public function attack(Unit $opponent)
    {
        if (! $this->weapon) {
            throw new Exception("The unit has not weapon");
        }
        show($this->weapon->getDescription($this, $opponent));

        $opponent->takeDamage($this->weapon->getDamage());
    }

    public function takeDamage($damage)
    {
        $this->hp -= $this->absorbDamage($damage);
        if ($this->hp < 0) {
            $this->hp = 0;
        }

        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
        
        if ($this->hp <= 0) {
            $this->die();
        }
    }
    
    public function move($direction)
    {
        show("{$this->name} camina hacia {$direction}");
    }

    public function die()
    {
        show("{$this->name} Muere");
        exit();
    }

    protected function absorbDamage($damage)
    {
        if($this->armor) {
            $damage = $this->armor->absorbDamage($damage);
        }
        return $damage;
    }
} 