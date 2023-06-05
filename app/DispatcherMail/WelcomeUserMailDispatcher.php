<?php

namespace App\DispatcherMail;
use Illuminate\Support\Facades\Mail;
use Larch\Contracts\Mails\WelcomeUserMail;
use Larch\Contracts\Models\UserModel;


class WelcomeUserMailDispatcher implements WelcomeUserMail
{
    public function sendMail(UserModel $user): void
    {
        Mail::to($user->getEmail()->getValue())
            ->send(new \App\Mail\WelcomeUserMail($user));
    }
}