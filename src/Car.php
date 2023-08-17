<?php

declare(strict_types=1);

namespace MichalWrona\PhpStarter;

class Car
{
    private string $brand;

    private string $model;

    private array $data;

    public function __serialize(): array
    {
        return [
            'brand' => $this->getBrand(),
            'model' => $this->getModel(),
            'color' => 'black'
        ];
    }

    public function __call(string $name, array $arguments)
    {
        return match (substr($name, 0, 3)) {
            'set' => $this->data[substr($name, 3)] = $arguments[0] ?: null,
            'get' => $this->data[substr($name, 3)],
            default => 'Method' . $name . ' does not exist on class ' . self::class,
        };
    }
    public function setData($key, $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
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
