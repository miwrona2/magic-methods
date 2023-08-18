#Magic Methods
Project presents possible usages of magic methods in PHP.

Project to be run on Linux.
Require:

- Docker
- Docker Compose
- Composer

#### Run docker container

``docker compose up -d``

#### add ```127.0.0.1 local.php.com``` to your /etc/hosts

#### To install run

``composer install``
and add 127.0.0.1 local.php.com to your /etc/hosts

Sandbox
To test and experiment:

- Open in browser https://local.php.com/
- go to index.php in text editor, instantiate classes with examples in ``/src`` directory and call their public
  methods .

Examples:
- __serialize

  _index.php_
```php
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
```

_src/Car.php_
```php
<?php

declare(strict_types=1);

namespace MichalWrona\MagicMethods;

class Car
{
    private string $brand;

    private string $model;

    public function __serialize(): array
    {
        return [
            'brand' => $this->getBrand(),
            'model' => $this->getModel(),
            'color' => 'black'
        ];
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }
}

```

- __call

  _index.php_
```php
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

//2. Getter 'getType' and setter 'setType' not declared in class Company
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
```
_src/Company.php_
```php
<?php

declare(strict_types=1);

namespace MichalWrona\MagicMethods;

class Company
{
    private string $name;

    private string $industry;

    private array $data;

    public function __call(string $name, array $arguments)
    {
        return match (substr($name, 0, 3)) {
            'set' => $this->data[substr($name, 3)] = $arguments[0] ?: null,
            'get' => $this->data[substr($name, 3)],
            default => 'Method' . $name . ' does not exist on class ' . self::class,
        };
    }
    public function setData(string $key, mixed $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIndustry(): string
    {
        return $this->industry;
    }

    public function setIndustry(string $industry): void
    {
        $this->industry = $industry;
    }
}
```