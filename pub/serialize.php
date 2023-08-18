<?php

declare(strict_types=1);

use MichalWrona\MagicMethods\Car;

print '<h1>Magic Methods in PHP</h1>' . PHP_EOL;

//__serialize() example
print '<h3>__serialize</h3>' . PHP_EOL;

$car = new Car();
$car->setBrand('Chevrolet');
$car->setModel('Tahoe');

print_r('<pre>');
print_r(serialize($car));
print_r('</pre>');
/**
 * without __serialize() implemented in Car
 * O:26:"MichalWrona\MagicMethods\Car":2:{s:33:"MichalWrona\MagicMethods\Carbrand";s:9:"Chevrolet";s:33:"MichalWrona\MagicMethods\Carmodel";s:5:"Tahoe";}
 *
 * with __serialize() implemented in Car
 * O:26:"MichalWrona\MagicMethods\Car":3:{s:5:"brand";s:9:"Chevrolet";s:5:"model";s:5:"Tahoe";s:5:"color";s:5:"black";}
 */

