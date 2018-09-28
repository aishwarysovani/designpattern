<?php
include "utility.php";
//interface for operation function
interface operation
{
    public function perform($a, $b);
}

//class implements interface for addition
class Add implements operation
{
    public function perform($a, $b)
    {
        $a1 = $a + $b;
        echo "addtion=" . $a1;
    }
}

//class implements interface for subtraction
class Subtract implements operation
{
    public function perform($a, $b)
    {
        $a1 = $a - $b;
        echo "subtraction=" . $a1;
    }
}

//class implements interface for multiplication
class Multiply implements operation
{
    public function perform($a, $b)
    {
        $a1 = $a * $b;
        echo "multiplication=" . $a1;
    }
}

//class implements interface for division
class Divide implements operation
{
    public function perform($a, $b)
    {
        if ($b == 0) {
            throw new Exception('Division by zero.');
        }
        $a1 = $a / $b;
        echo "division=" . $a1;
    }
}

//call all class in single for avoid complexity
class performOperation
{
    protected $a, $b;

   function performOperation($a, $b)
    {
        $add = new Add();
        $sub = new Subtract();
        $mul = new Multiply();
        $divide = new Divide();
        $this->a = $a;
        $this->b = $b;
        $add->perform($a, $b);
        echo "\n";
        $sub->perform($a, $b);
        echo "\n";
        $mul->perform($a, $b);
        echo "\n";
        $divide->perform($a, $b);
        echo "\n";
    }
}

/**
 * @a,@b int 
 */
echo"enter two numbers to perform algebric operation:";
$a=validatenum();
$b=validatenum();
$performOperation = new performOperation($a,$b);

?>