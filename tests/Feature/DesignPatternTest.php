<?php

namespace Tests\Feature;

use DesignPattern\TemplateMethod\Client\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DesignPatternTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTemplateMethod()
    {
        $client = new Client;
        $client->display();
        $this->assertTrue(true);
    }
}
