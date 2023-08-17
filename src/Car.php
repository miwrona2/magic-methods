<?php

declare(strict_types=1);

namespace MichalWrona\PhpStarter;

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
        ];:
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
