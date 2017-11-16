<?php

namespace Tests\Feature;

use DesignPattern\Singleton\Client as SingletonClient;
use DesignPattern\TemplateMethod\Client\Client as TemplateClient;
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
        $client = new TemplateClient;
        $client->display();
        $this->assertTrue(true);
    }

    public function testGetEncoding()
    {
        dd(mb_internal_encoding());
    }

    public function testSingleton()
    {
        $client = new SingletonClient();
        $this->assertTrue($client->compareInstance());
        $this->assertTrue($client->compareId());
        try{
            $client->cloneSingleton();
            $this->fail('例外発生無し');
        }catch(\RuntimeException $e){
            $this->assertEquals('Clone is not allowed against DesignPattern\Singleton\SingletonSample',$e->getMessage());
        }
    }
}
