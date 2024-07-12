<?php

namespace App\Tests\Unit\Common\Domain\ValueObject;

use App\Common\Domain\ValueObject\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testItCanBeInstantiatedWithValidEmail(): void
    {
        $this->assertInstanceOf(
            Email::class,
            new Email('valid@email.com')
        );
    }

    public function testItMustNotExceed73Characters(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email(str_pad('email@test.com', 74, 'a', STR_PAD_LEFT));
    }

    public function testItMustBeAnEmail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('notAnEmail(at)test(dot)com');
    }
}
