<?php

namespace Larch\Contracts\Mails;
use Larch\Contracts\Models\UserModel;

interface WelcomeUserMail
{
    public function sendMail(UserModel $user): void;
}