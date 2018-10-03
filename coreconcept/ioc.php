<?php
/**
 * @param getRateOfInterest()
 */
interface Bank {
    function getRateOfInterest();
 
}

/**
 * @return int
 */
class CitiBank implements Bank 
{
    function getRateOfInterest() {
        return 15;
    }
 
}

/**
 * @return int
 */
class HdfcBank implements Bank 
{
    function getRateOfInterest() {
        return 13;
    }
 
}

/**
 * @obj
 * shows loose coupling
 */
class BankService 
{
    protected $bank;
    function __construct($bank)
    {
        $this->bank = $bank;
    }
    
    function rateOfInterest() {
        echo"\nRate of Interest is " . $this->bank->getRateOfInterest(). "%";
    }
 
}

/**
 * @obj
 * shows tight coupling
 */
class BankService1 
{
    protected $bank;
    function __construct()
    {
        $this->bank =new HdfcBank();
    }
    
    function rateOfInterest1() {
        echo"\nRate of Interest is " . $this->bank->getRateOfInterest(). "%";
    }
 
}

/**
 * @var int
 */
echo"enter name of bank which rate of interest you want to see:";
echo"\n 1.HDFC \n 2.City bank";
$c=readline();
switch($c) 
{
    case 1:$bank=new HdfcBank();
            $bankService = new BankService($bank);
            $bankService->rateOfInterest();
            echo"\nshows loosely coupled after IOC used\n";
            break;
    
    case 2:$bank=new CitiBank();
            $bankService = new BankService($bank);
            $bankService->rateOfInterest();
            echo"\nshows loosely coupled after IOC used\n";
            break;
    default:break;
}


$bankService1 = new BankService1();
$bankService1->rateOfInterest1();
echo"\nshows tightly coupled before IOC used";
?>