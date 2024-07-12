<?php

namespace App\Tests\Feature\Mocks\Http;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class EndpointControllerTest extends WebTestCase
{
    abstract protected function getEndpoint(): string;
}
