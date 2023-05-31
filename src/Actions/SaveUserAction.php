<?php

namespace Larch\Actions;

use Larch\contracts\models\UserAR;

class SaveUserAction
{
    private UserAR $user;

    public function __construct(UserAR $user)
    {
        $this->user = $user;
    }

    public function execute(): void
    {
        $this->validate();
        $this->user->saveUser();
    }

    private function validate(): void
    {
        if(empty($this->user->getName())) {
            throw new \InvalidArgumentException('Name is required');
        }

        if(empty($this->user->getEmail())) {
            throw new \InvalidArgumentException('Email is required');
        }

        if(empty($this->user->getPassword())) {
            throw new \InvalidArgumentException('Password is required');
        }
    }
}