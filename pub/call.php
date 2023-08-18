<?php

declare(strict_types=1);

use MichalWrona\MagicMethods\Company;

//__call example
print '<h3>__call</h3>' . PHP_EOL;

$company = new Company();

//1. Getters and setters declared in class Company
$company->setName('eBay');
$company->setIndustry('E-commerce');
print $company->getName();
//Allegro

print '</br>';

print $company->getIndustry();
//E-commerce

print '</br>';

//2. Getter 'getType', 'setType' not declared in class Company
$company->setData('Type', 'LLC');
print $company->getType();
//LLC

print '</br>';

//3. Getter and setter pair 'getEstablishedYear', 'setEstablishedYear' not declared in class Company
$company->setEstablishedYear(2011);;
print $company->getEstablishedYear();
//2011

print '</br>';

var_dump($company->getData());
//array(2) { ["Type"]=> string(3) "LLC" ["ProductionYear"]=> int(2011) }