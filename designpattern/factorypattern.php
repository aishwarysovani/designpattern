<?php
/**
 * factory class give defination for all types 
 */
class computerFactory {
 
    public function __construct() {
        // ... //
    }
 
    public static function build ($type = '') {
             
        if($type == '') {
            throw new Exception('Invalid computer Type.');
        } else {
 
            $className = 'computer_'.ucfirst($type);
 
            // Assuming Class files are already loaded using autoload concept
            if(class_exists($className)) {
                return new $className();
            } else {
                throw new Exception('computer type not found.');
            }
        }
    }
}

class computer_pc {
     
    public function __construct() {
        echo "Creating pc";
    }
     
}
 
class computer_laptop {
 
    public function __construct() {
        echo "Creating laptop";
    }
 
}

class computer_server {
 
    public function __construct() {
        echo "Creating server";
    }
 
}

// Creating new pc
$pc = computerFactory::build('pc');
echo"\n"; 
// Creating new laptop
$laptop = computerFactory::build('laptop');
echo"\n";
// Creating new server
$server = computerFactory::build('server');
echo"\n";
?>