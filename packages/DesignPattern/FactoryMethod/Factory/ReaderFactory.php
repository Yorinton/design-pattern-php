<?php

namespace DesignPattern\FactoryMethod\Factory;

use DesignPattern\FactoryMethod\CSVFileReader;
use DesignPattern\FactoryMethod\XMLFileReader;

class ReaderFactory
{
    public function create($filename)
    {
        $reader = $this->createReader($filename);
        return $reader;
    }

    private function createReader($filename)
    {
        $poscsv = stripos($filename,'.csv');
        $posxml = stripos($filename,'.xml');

        //CSVFileReaderをnewするか、XMLFileReaderをnewするかをReaderFactoryの中で判断する
        //クライアント側で判断する必要が無くなる
        if($poscsv !== false){
            return new CSVFileReader($filename);
        }elseif($posxml !== false){
            return new XMLFileReader($filename);
        }else{
            //メッセージを出力し現在のスクリプトを終える
            die('This filename is not supported：'.$filename);
        }

    }
}