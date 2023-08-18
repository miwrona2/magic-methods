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
