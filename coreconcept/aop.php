<?php
class Employee {

	private $name;
	
	function getName() {
		return $this->name;
	}
	function setName($nm) {
		echo $this->name=$nm . "\n";
	}
	
	function throwException(){
		throw new RuntimeException("Dummy Exception");
	}	
}


class EmployeeService extends Employee{

	private $employee;
	
	function getEmployee(){
		return $this->employee;
	}
	
	function setEmployee($e){
		$this->employee=$e;
	}
}

class EmployeeAspect extends Employee{
/** 
 * @aspect\Before("method(.*->getName.*())")
 * */
	
	function getNameAdvice($s){
		echo"\nExecuting Advice on getName()";
	}
}	

class EmployeeAspectPointcut extends Employee{

    /*
    *@Before("getNamePointcut()")
    */
	function loggingAdvice($s){
		echo"\n" . $s ."Executing loggingAdvice on getName()";
	}
	
    /*
    *@Pointcut("execution(public String getName())")
    */
    function getNamePointcut(){}
}

class EmployeeAspectJoinPoint{
	
	/**
    * Advice arguments, will be applied to bean methods with single String argument
	* @Before("args(name)")
    */
    function logStringArguments($name){
		echo"\nString argument passed=". $name;
	}
}

class EmployeeAfterAspect{

    /**
    *@After("args(name)")
    */
    function logStringArguments($name){
		echo"\nRunning After Advice. String argument passed=" . $name;
	}
    
    /**
	*@AfterReturning(pointcut="execution(* getName())", returning="returnString")
    */
    function getNameReturningAdvice($returnString){
		echo"\ngetNameReturningAdvice executed. Returned String=" . $returnString;
	}
}

$employeeService= new EmployeeService();
$employeeService->getName();
$employeeService->setName("Pankaj");
//$employeeService->throwException();
$es=new EmployeeAspect();
$es->getName();
$es->getNameAdvice($es->setName("gargi"));
$es1=new EmployeeAspectPointcut();
$es1->loggingAdvice($es1->setName("gargi"));
?>