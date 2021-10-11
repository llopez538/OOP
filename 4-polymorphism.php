<?php
function show($message)
{
    echo "<p>$message</p>";
}

abstract class Unit
{
    protected $hp = 40;
    protected $name;
    protected $armor;

    public function __construct($name)
    {
        $this->name = $name;
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

    abstract public function attack(Unit $opponent);

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
        return $damage;
    }

} 

class Soldier extends Unit
{
    protected $damage = 40;

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function attack(Unit $opponent)
    {
        show("{$this->name} ataca con la espada a {$opponent->getName()}");

        $opponent->takeDamage($this->damage);
    }
    
    protected function absorbDamage($damage)
    {
        if($this->armor) {
            $damage = $this->armor->absorbDamage($damage);
        }
        return $damage;
    }
}

class Archer extends Unit
{
    protected $damage = 20;

    public function attack(Unit $opponent)
    {
        show("{$this->name} dispara una flecha a {$opponent->getName()}");
        $opponent->takeDamage($this->damage);
    }
}

interface Armor
{
    public function absorbDamage($armor);
}

class BronzeArmor implements Armor
{
    public function absorbDamage($damage) {
        return round($damage/2);
    }
}

class MissArmor implements Armor
{
    public function absorbDamage($damage) {
        $bingo = rand(1, 10);
        
        if ($bingo == 1 || $bingo == 3 || $bingo == 7 || $bingo == 4 || $bingo == 10) {
            echo "Fallaste el ataque";
        }
        return round($damage);
    }
}

$armor = new BronzeArmor();

$armorMiss = new MissArmor();

$ramm = new Soldier('Ramm', $armor);

$silence = new Archer('Silence');

$silence->attack($ramm);

$ramm->setArmor($armorMiss);

$silence->attack($ramm);

$ramm->attack($silence);