<?php

namespace Tests\Feature;

use DesignPattern\Adapter\ShowFile;
use DesignPattern\Singleton\Client as SingletonClient;
use DesignPattern\TemplateMethod\Client\Client as TemplateClient;
use DesignPattern\Adapter\Client as AdapterClient;
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

    public function testAdapter()
    {
        $client = new AdapterClient;
        $client->showFileImplEx('./packages/DesignPattern/Adapter/Client.php');
        $client->showFileImplTransfer('./packages/DesignPattern/Adapter/Client.php');

        $this->assertTrue(true);
    }

    public function testShowFile()
    {
        $show_file = new ShowFile('./packages/DesignPattern/Adapter/Client.php');
        $show_file->showPlain();

        $this->assertTrue(true);

    }
}
