<?php
/**
 * class emplyee to get information from user
 */
class Employee{
    private $eName;
    private $eId;
    private $age;
 
    
    public function __construct($name,$id,$age) {
        $this->eName = $name;
        $this->eId = $id;
        $this->age   = $age;
        echo "name=" . $this->eName . "\n Id=" . $this->eId . "\n age=" . $this->age; 

    }
 
    /**
     * clone function will create prototype of previous object
     */
    public function __clone() {
        echo"**copy of** \n name=" . $this->eName . "\n id=" . $this->eId . "\n age=" . $this->age;
    }
}

/**
 * object creation 
 */
$e1=new Employee('aish',3,21);
echo"\n";
$e2 = clone $e1;
?>