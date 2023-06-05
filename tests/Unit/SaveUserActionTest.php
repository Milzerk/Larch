<?php

namespace Tests\Unit;

use Larch\Actions\SaveUserAction;
use Larch\Contracts\Models\UserModel;
use Larch\ObjectsValue\Email;
use Larch\ObjectsValue\Name;
use Larch\ObjectsValue\Password;
use PHPUnit\Framework\TestCase;

class SaveUserActionTest extends TestCase
{

    public function test_save_user_with_name_empty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Name is required');

        $userMock = $this->createMock(UserModel::class);
        $userMock->method('getName')->willReturn(new Name(''));
        $userMock->method('getEmail')->willReturn(new Email('John@mail.com'));
        $userMock->method('getPassword')->willReturn(new Password('123456'));

        $mailMock = $this->createMock(\Larch\Contracts\Mails\WelcomeUserMail::class);

        (new SaveUserAction($userMock, $mailMock))->execute();
    }

    public function test_save_user_with_email_empty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Email is required');

        $userMock = $this->createMock(UserModel::class);
        $userMock->method('getName')->willReturn(new Name('John Doe'));
        $userMock->method('getEmail')->willReturn(new Email(''));
        $userMock->method('getPassword')->willReturn(new Password('123456'));

        $mailMock = $this->createMock(\Larch\Contracts\Mails\WelcomeUserMail::class);

        (new SaveUserAction($userMock, $mailMock))->execute();
    }

    public function test_save_user_with_password_empty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Password is required');

        $userMock = $this->createMock(UserModel::class);
        $userMock->method('getName')->willReturn(new Name('John Doe'));
        $userMock->method('getEmail')->willReturn(new Email('John@mail.com'));
        $userMock->method('getPassword')->willReturn(new Password(''));

        $mailMock = $this->createMock(\Larch\Contracts\Mails\WelcomeUserMail::class);

        (new SaveUserAction($userMock, $mailMock))->execute();    }

    public function test_save_user_with_success(): void
    {
        $userMock = $this->createMock(UserModel::class);
        $userMock->method('getName')->willReturn(new Name('John Doe'));
        $userMock->method('getEmail')->willReturn(new Email('John@mail.com'));
        $userMock->method('getPassword')->willReturn(new Password('123456'));

        $mailMock = $this->createMock(\Larch\Contracts\Mails\WelcomeUserMail::class);

        (new SaveUserAction($userMock, $mailMock))->execute();        
        $this->assertTrue(true);
    }
}