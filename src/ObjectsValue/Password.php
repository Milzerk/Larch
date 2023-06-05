<?php

namespace Larch\ObjectsValue;

class Password implements \Stringable
{
    private string $password;

    public function __construct(string $password)
    {
        if(empty($password)) {
            throw new \InvalidArgumentException('Password is required');
        }
        $this->password = $password;
    }

    public function getValue(): string
    {
        return $this->password;
    }

    public function __toString(): string
    {
        return $this->password;
    }
}