<?php

namespace Larch\Actions;

use Larch\Contracts\Mails\WelcomeUserMail;
use Larch\Contracts\Models\UserModel;

class SaveUserAction
{
    public function __construct(
        private UserModel $user,
        private WelcomeUserMail $welcomeUserMail
    ) { }

    public function execute(): void
    {
        $this->validate();
        $this->user->saveUser();
        $this->welcomeUserMail->sendMail($this->user);
    }

    private function validate(): void
    {
        if (empty($this->user->getName())) {
            throw new \InvalidArgumentException('Name is required');
        }

        if (empty($this->user->getEmail())) {
            throw new \InvalidArgumentException('Email is required');
        }

        if (empty($this->user->getPassword())) {
            throw new \InvalidArgumentException('Password is required');
        }
    }
}