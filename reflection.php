<?php
class Parent1
{
    public function description() {
        echo "I am a super class for the Child class\n";
    }
}

class Child extends Parent1
{
    public function description() {
        echo "I'm " . get_class($this) , " class\n";
        echo "I'm " . get_parent_class($this) , "'s child\n";
    }
}


interface ICurrencyConverter
{
    public function convert($currency, $amount);
}

class GBPCurrencyConverter implements ICurrencyConverter
{
    public $name = "GBPCurrencyConverter";
    public $rates = array("USD" => 1,
                          "AUD" => 1.24);
    protected $var1;
    private $var2;

    function __construct() {}

    function convert($currency, $amount) {
        return $rates[$currency] * $amount;
    }
}

$child = new ReflectionClass("Child");
$parent = $child->getParentClass();
echo $child->getName() . " is a subclass of " . $parent->getName() . "\n";
$c=new Child();
echo "name of class:" . get_class($c) . "\n";
$c->description();

$reflection = new ReflectionClass("GBPCurrencyConverter");
$interfaceNames = $reflection->getInterfaceNames();
if (in_array("ICurrencyConverter", $interfaceNames)) {
    echo "GBPCurrencyConverter implements ICurrencyConverter\n";
}

$methods = $reflection->getMethods();
echo "The following methods are available:\n";
print_r($methods);

if ($reflection->hasMethod("convert")) {
    echo "The method convert() exists for GBPCurrencyConverter.\n";
}


?>