<?php

namespace Larch\ObjectsValue;

class Phrase implements \Stringable
{
    private string $phrase;

    public function __construct(string $phrase)
    {
        if(empty($phrase)) {
            throw new \InvalidArgumentException('Phrase is required');
        }
        $this->phrase = $phrase;
    }

    public function getValue(): string
    {
        return $this->phrase;
    }

    public function __toString(): string
    {
        return $this->phrase;
    }
}