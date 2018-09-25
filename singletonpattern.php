<?php
class User
{
    // Hold an instance of the class
    private static $instance;
 
    // The singleton method
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            self::$instance = new User();
        }
        echo"instace created \n";
        return self::$instance;
    }
    
}
$user1 = User::singleton();
$user2 = User::singleton();



?>