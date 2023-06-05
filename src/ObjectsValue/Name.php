<?php

namespace Larch\ObjectsValue;

class Name implements \Stringable
{
    private string $name;

    public function __construct(string $name)
    {
        if(empty($name)) {
            throw new \InvalidArgumentException('Name is required');
        }
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}