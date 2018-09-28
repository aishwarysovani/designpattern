<?php
/**
 * class socket to take 120v
 */
class Socket {
 
   function __construct()
   {
    
   }
   /**
    * @v int
    */
    public function getVolt() {
       
        $v=120;
        return $v;
   }
}

/**
 * socketAdapter interface will declare abstract methods
 */
interface socketAdapter {
    public function get120v();
    public function get3v();
}


/**
 * SocketclassAdapter will take 120v input and convert into 3v 
 * by implementing interface
 */
class socketclassAdapter implements socketAdapter {
 
   function __construct()
   {

   }
   function get120v()
   {
       $v=Socket::getVolt();
       return $v;

   }

   function get3v()
   {
       $v=socketclassAdapter::get120v();
       $volt=socketclassAdapter::convertVolt($v,40);
       echo"getting " . $volt .  "volt from " . $v ."volt";
   }
   function convertVolt($v,$i)
   {
       $v1=$v/$i;
       return $v1;
   }
 
}


/**
 * SocketclassAdapter will take 240v input and convert into 3v 
 * by implementing interface
 */
class socketobjectAdapter  implements socketAdapter {
 
    function __construct()
    {
 
    }
    function get120v()
    {
        $v=Socket::getVolt();
        return $v;
 
    }
 
    function get3v()
    {
        $v=socketclassAdapter::get120v();
        $v2=$v*2;
        $volt=socketclassAdapter::convertVolt($v2,80);
        echo"getting " . $volt .  "volt from " . $v2 ."volt";
    }
    function convertVolt($v,$i)
    {
        $v1=$v/$i;
        return $v1;
    }
  
  
 }

//object creation
$socketclassAdapter=socketclassAdapter::get3v();
echo"\n";
$socketobjectAdapter=socketobjectAdapter::get3v();
?>