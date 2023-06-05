<?php

namespace Larch\Actions;
use Larch\Contracts\Models\UserModel;

class UpdateUserAction
{
    private UserModel $user;

    public function __construct(UserModel $user)
    {
        $this->user = $user;
    }

    public function execute(): void
    {
        $this->validate();
        $this->user->updateUser();
    }

    private function validate(): void
    {
        $this->userDesactivated();
        $this->userCreatedInLastYear();
    }

    private function userDesactivated()
    {
        $user = $this->user;
        if($user->isDeactivated()) 
            throw new \InvalidArgumentException('User must be active');
    }

    private function userCreatedInLastYear()
    {
        $user = $this->user;
        $lastYear = new \DateTimeImmutable('-1 year');
        if($user->getCreatedAt() >= $lastYear) {
            throw new \InvalidArgumentException('User not must be created in last year');
        }
    }
}