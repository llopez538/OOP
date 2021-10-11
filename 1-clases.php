<?php
class Person {
    protected $name;
    protected $lastName;
    protected $nickname;
    protected $birthDate;
    protected $changedNickName = 0;
    
    public function __construct($name, $lastName, $birthDate){
        $this->name = $name;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate; 
    }

    public function getName(){
        return $this->name;
    }
    
    public function getLastName(){
        return $this->lastName;
    }
    
    public function getNickname(){
        
        return strtolower($this->nickname);
    }

    public function setNickname($nickname){
        if (strlen($nickname) > 2) {
            $this->nickname = $nickname;
        } else {
            echo "Debes tener mas de dos caracteres <br>";
        }

        if ($this->changedNickname < 2) {
            $this->nickname = $nickname;
            $this->changedNickname++;
        }
    }

    public function getAge(){
        $dateY = idate('Y');
        $dateM = idate('m');
        $age = explode("-", $this->birthDate);
        if ($dateM - intval($age[1]) !== 0 && !empty($age)) {
           $age = ($dateY - intval($age[0])) -1;
           echo $age;
        }
    }

    public function getFullName(){
        return $this->name . " " . $this->lastName . " " . $this->getNickname();
    }
}

$p1 = new Person('Alberto', 'Chiguagua', '1991-12');
echo date('d-m-y') . "<br>";
exit($p1->getAge());

?>
