<?php

namespace App\Tests\Unit\Common\Domain\ValueObject;

use App\Common\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid as UuidLib;

class UuidTest extends TestCase
{
    public function testItCanBeInstantiatedWithValidUuid(): void
    {
        $this->assertInstanceOf(
            Uuid::class,
            new Uuid(UuidLib::v4())
        );
    }

    public function testItMustBeAnUuid(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Uuid('1nv4l1d-uu1d-M4S39Dpf-qoZpDqsDYB');
    }
}
