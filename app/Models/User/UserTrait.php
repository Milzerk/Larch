<?php

namespace App\Models\User;

use Larch\ObjectsValue\Email;
use Larch\ObjectsValue\Id;
use Larch\ObjectsValue\Name;
use Larch\ObjectsValue\Password;

trait UserTrait
{
    public function getId(): Id
    {
        return new Id($this->id);
    }
    
    public function getName(): Name
    {
        return new Name($this->name);
    }

    public function getEmail(): Email
    {
        return new Email($this->email);
    }

    public function getPassword(): Password
    {
        return new Password($this->password);
    }

    public function saveUser(): void
    {
        $this->save();
    }

    public function updateUser(): void
    {
        $this->update();
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return \DateTimeImmutable::createFromInterface($this->created_at);
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isDeactivated(): bool
    {
        return !$this->isActive();
    }

    public function activate(): void
    {
        $this->active = true;
    }

    public function deactivate(): void
    {
        $this->active = false;
    }
}
