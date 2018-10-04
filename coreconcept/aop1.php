<?php
interface Aspect
{
    function beforeMethodExecution(MethodInvocation $invocation);
}

class Example
{
    protected $msg="AOP";
    function hellow()
    {
        echo"hello you have public msg " . $this->msg;
    }
}

class debugAspect implements Aspect
{
    function beforeMethodExecution(MethodInvocation $invocation)
    {
        $obj=$invocation->getThis();
        $method=$invocation->getMethod();
        echo"\n method " . _METHOD_ . " intercepter for this method";
        $obj===(object) $obj ? get_class($obj) : $obj;
        $method->isStatic ? '::' : '->';
        echo $method->name ,
        '()',
        'with arguments ',
        json_encode($invocation->getArguments()),
        "<br>\n";
    }
}

$ex=new Example("AOP");
$ex->hellow();
?>