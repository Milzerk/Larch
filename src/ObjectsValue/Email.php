<?php

namespace Larch\ObjectsValue;

class Email implements \Stringable
{
    private string $email;

    public function __construct(string $email)
    {
        if(empty($email)) {
            throw new \InvalidArgumentException('Email is required');
        }
        $this->email = $email;
    }

    public function getValue(): string
    {
        return $this->email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}