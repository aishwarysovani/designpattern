<?php
include 'utility.php';
//interface for clone function
interface prototype{
    public function __clone();
}

/**
 * class emplyee to get information from user
 */
class Employee implements prototype{
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
        return new Employee($this->eName,$this->eId,$this->age);
    }
}

/**
 * object creation 
 * @name string
 * @id,@age int
 */
echo"enter your name:";
$name=validatename();
echo"\n enter your id:";
$id=validatenum();
echo"\n enter your age:";
$age=validatenum();
$e1=new Employee($name,$id,$age);
echo"\n copy of object:\n";
$e2 = clone $e1;
?>