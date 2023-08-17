<?php

require('../vendor/autoload.php');

use MichalWrona\PhpStarter\Car;
use MichalWrona\PhpStarter\Company;

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
 * O:26:"MichalWrona\PhpStarter\Car":2:{s:33:"MichalWrona\PhpStarter\Carbrand";s:9:"Chevrolet";s:33:"MichalWrona\PhpStarter\Carmodel";s:5:"Tahoe";}
 *
 * with __serialize() implemented in Car
 * O:26:"MichalWrona\PhpStarter\Car":3:{s:5:"brand";s:9:"Chevrolet";s:5:"model";s:5:"Tahoe";s:5:"color";s:5:"black";}
 */


//__call example
print '<h3>__call</h3>' . PHP_EOL;

$company = new Company();

//1. Getters and setters declared in class Company
$company->setName('Allegro');
$company->setIndustry('E-commerce');
print $company->getName();
//Allegro

print '</br>';

print $company->getIndustry();
//E-commerce

print '</br>';

//2. Getter 'getType', 'setType' not declared in class Company
$company->setData('Type', 'SUV');
print $company->getType();
//SUV

print '</br>';

//3. Getter and setter pair 'getProductionYear', 'setProductionYear' not declared in class Company
$company->setProductionYear(2011);;
print $company->getProductionYear();
//2011

print '</br>';

var_dump($company->getData());
//array(2) { ["Type"]=> string(3) "SUV" ["ProductionYear"]=> int(2011) }