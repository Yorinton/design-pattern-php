<?php

namespace DesignPattern\FactoryMethod;

use Exception;

class XMLFileReader implements Reader
{

    private $filename;

    private $handler;

    /**
     * XMLFileReader constructor.
     * @param $filename
     * @throws Exception
     */
    public function __construct($filename)
    {
        if(!is_readable($filename)){
            throw new Exception('file"'.$filename.'"is not readable');
        }
        $this->filename = $filename;
    }

    function read()
    {
        $this->handler = simplexml_load_file($this->filename);
    }

    private function convert($str)
    {
        //現在の内部文字エンコーディングに変換
        return mb_convert_encoding($str,mb_internal_encoding(),"auto");
    }

    function display()
    {
        foreach($this->handler->artist as $artist){
            echo "<b>".$this->convert($artist["name"])."</b>";
            echo "<ul>";
            foreach($artist->music as $music){
                echo "<li>";
                echo $this->convert($music["name"]);
                echo "</li>";
            }
            echo "</ul>";
        }
    }
}