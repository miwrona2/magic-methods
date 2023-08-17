<?php
echo 'Magic Methods';

require('../vendor/autoload.php');

use MichalWrona\PhpStarter\Car;

//__serialize() example

$car = new Car();
$car->setBrand('Chevrolet');
$car->setModel('Tahoe');

print_r('<pre>');
print_r(serialize($car));
print_r('</pre>');
/**
 * without __serialize() implemented in Car
 * O:26:"MichalWrona\PhpStarter\Car":2:{s:33:"MichalWrona\PhpStarter\Carbrand";s:9:"Chevrolet";s:33:"MichalWrona\PhpStarter\Carmodel";s:5:"Tahoe";}
 *
 * with __serialize() implemented in Car
 * O:26:"MichalWrona\PhpStarter\Car":3:{s:5:"brand";s:9:"Chevrolet";s:5:"model";s:5:"Tahoe";s:5:"color";s:5:"black";}
 */


//__call example

$car->setData('Type', 'SUV');
print_r('<pre>');
print_r($car->getType());
print_r('</pre>');

$car->setProductionYear(2011);
print_r('<pre>');
print_r($car->getProductionYear());
print_r('</pre>');

var_dump($car->getData());