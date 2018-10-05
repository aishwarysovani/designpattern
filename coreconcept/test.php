<?php
//include "anotation.php";
class Test
{
    /**
     * @var integer
     * @range(0,100)
     * @label('Number of a')
     */
    public $a;
    function run()
    {
        echo"enter any number";
        $a=readline();
        echo $a;
    }
}

$c=new Test();
$c->run();
?>