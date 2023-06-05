<?php

namespace Tests\Unit;

use Larch\Actions\UpdateUserAction;
use Larch\Contracts\Models\UserModel;
use Larch\ObjectsValue\Email;
use Larch\ObjectsValue\Name;
use Larch\ObjectsValue\Password;
use PHPUnit\Framework\TestCase;

class UpdateUserActionTest extends TestCase
{
    public function test_update_user_with_success(): void
    {
        $userMock = $this->createMock(UserModel::class);
        $userMock->method('getName')->willReturn(new Name('John Doe'));
        $userMock->method('getEmail')->willReturn(new Email('John@mail.com'));
        $userMock->method('getPassword')->willReturn(new Password('123456'));
        $userMock->method('getCreatedAt')->willReturn(new \DateTimeImmutable('-2 years'));

        $updateUserAction = new UpdateUserAction($userMock);
        $updateUserAction->execute();

        $this->assertTrue(true);
    }
}
