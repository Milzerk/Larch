<?php

namespace Larch\Contracts\Models;

use Larch\ObjectsValue\Email;
use Larch\ObjectsValue\Id;
use Larch\ObjectsValue\Name;
use Larch\ObjectsValue\Password;

interface UserModel
{
    public function getId(): Id;
    
    public function getName(): Name;

    public function getEmail(): Email;

    public function getPassword(): Password;

    public function getCreatedAt(): \DateTimeInterface;

    public function isActive(): bool;

    public function isDeactivated(): bool;

    public function activate(): void;

    public function deactivate(): void;

    public function saveUser(): void;

    public function updateUser(): void;
}