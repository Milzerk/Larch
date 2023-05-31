<?php

namespace Tests\Unit;

use Larch\Actions\SaveUserAction;
use Larch\Contracts\Models\UserAR;
use PHPUnit\Framework\TestCase;

class SaveUserActionTest extends TestCase
{
    
    public function test_save_user_with_name_empty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Name is required');

        $userARMock = $this->createMock(UserAR::class);
        $userARMock->method('getName')->willReturn('');

        (new SaveUserAction($userARMock))->execute();
    }

    public function test_save_user_with_email_empty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Email is required');

        $userARMock = $this->createMock(UserAR::class);
        $userARMock->method('getName')->willReturn('John Doe');
        $userARMock->method('getEmail')->willReturn('');

        (new SaveUserAction($userARMock))->execute();
    }

    public function test_save_user_with_password_empty(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Password is required');

        $userARMock = $this->createMock(UserAR::class);
        $userARMock->method('getName')->willReturn('John Doe');
        $userARMock->method('getEmail')->willReturn('John@mail.com');
        $userARMock->method('getPassword')->willReturn('');

        (new SaveUserAction($userARMock))->execute();
    }
    
    public function test_save_user_with_success(): void
    {
        $userARMock = $this->createMock(UserAR::class);
        $userARMock->method('getName')->willReturn('John Doe');
        $userARMock->method('getEmail')->willReturn('John@mail.com');
        $userARMock->method('getPassword')->willReturn('123456');

        (new SaveUserAction($userARMock))->execute();
        $this->assertTrue(true);
    }
}
