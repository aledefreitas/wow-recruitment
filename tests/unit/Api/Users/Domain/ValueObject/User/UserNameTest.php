<?php

namespace App\Tests\Unit\Api\Users\Domain\ValueObject\User;

use App\Api\Users\Domain\ValueObject\User\UserName;
use PHPUnit\Framework\TestCase;

class UserNameTest extends TestCase
{
    public function testItCanBeInstantiatedWithValidUsername(): void
    {
        $this->assertInstanceOf(
            UserName::class,
            new UserName('valid_username')
        );
    }

    public function testItMustContainAtLeastEightCharacters(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new UserName('test');
    }

    public function testItCantHaveMoreThanFiftyCharacters(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new UserName('this_is_a_really_invalid_long_username_for_real_lol');
    }

    public function testItMustContainOnlyAlphaNumPointAndHyphen(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new UserName('this_has_$pecial_chars');
    }

    public function testItCanBeCastToString(): void
    {
        $username = new UserName('valid_username');
        $this->assertEquals(
            'valid_username',
            (string) $username
        );
    }
}
