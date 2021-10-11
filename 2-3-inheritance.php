<?php
function show($message)
{
    echo "<p>$message</p>";
}

abstract class Unit
{
    protected $hp = 40;
    protected $name;

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

    abstract public function attack(Unit $opponent);

    public function takeDamage($damage)
    {
        // if ($opponent instanceof Soldier) {
        //     $damage = $this->damage/2;
        // } else {
        //     $damage = $this->damage;
        // }

        $this->setHp($this->hp - $damage);

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
    }

    public function setHp($points)
    {
        $this->hp = $points;
        show("{$this->name} ahora tiene {$this->hp} puntos de vida");
    }
} 

class Soldier extends Unit
{
    protected $damage = 40;
    protected $shield = 3;

    public function attack(Unit $opponent)
    {
        show("{$this->name} Cortar a {$opponent->getName()} en dos");

        $opponent->takeDamage($this->damage);
    }

    public function takeDamage($damage)
    {
        // parent nos permite llamar al metodo dentro de la clase padre que es Unit
        return parent::takeDamage(round($damage/$this->shield));
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

    public function takeDamage($damage)
    {
        if (rand(0,1)) {
            parent::takeDamage($damage);
        }
    }
}

$ramm = new Soldier('Ramm');
$silence = new Archer('Silence');

$silence->attack($ramm);
$silence->attack($ramm);
$ramm->attack($silence);







?>