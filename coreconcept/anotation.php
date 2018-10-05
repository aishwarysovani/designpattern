<?php

namespace mindplay\demo;
use Composer\Autoload\ClassLoader;
use mindplay\annotations\AnnotationCache;
use mindplay\annotations\Annotations;
use mindplay\demo\annotations\Package;
include "test.php";

$vendor_path = dirname(__DIR__) . '/vendor';
if (!is_dir($vendor_path)) {
echo 'Install dependencies first' . PHP_EOL;
exit(1);
}
require_once($vendor_path . '/autoload.php');
$auto_loader = new ClassLoader();
$auto_loader->addPsr4("mindplay\\demo\\", __DIR__);
$auto_loader->register();

Annotations::$config['cache'] = new AnnotationCache(__DIR__ . '/runtime');

Package::register(Annotations::getManager());
// class Test
// {
//     /**
//      * @var integer
//      * @range(0,100)
//      * @label('Number of a')
//      */
//     public $a;
//     function run()
//     {
//         echo"enter any number";
//         $a=readline();
//         echo $a;
//     }
// }

// $c=new Test();
// $c->run();
?>