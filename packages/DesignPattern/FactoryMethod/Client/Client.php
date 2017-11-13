<?php

namespace DesignPattern\FactoryMethod\Client;

use DesignPattern\FactoryMethod\Factory\ReaderFactory;

class Client
{
    public function displayMusics()
    {
        $filename = 'Music.xml';
        $factory = new ReaderFactory();
        //CSVFileReaderをnewするか、XMLFileReaderをnewするかをReaderFactoryの中で判断してnewしてくれる
        $data = $factory->create($filename);
        $data->read();
        $data->display();
    }
}