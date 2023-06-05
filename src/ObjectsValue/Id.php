<?php

namespace Larch\ObjectsValue;

class Id implements \Stringable
{
    private int $id;

    public function __construct(int $id)
    {
        if(!isset($id)) {
            throw new \InvalidArgumentException('Id is required');
        }
        
        if($id < 1) {
            throw new \InvalidArgumentException('Id must be greater than 0');
        }

        $this->id = $id;
    }

    public function getValue(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }
}