<?php

namespace Larch\Contracts\Models;

interface UserAR
{
    public function getName(): string;
    public function getEmail(): string;
    public function getPassword(): string;

    public function saveUser(): void;
}