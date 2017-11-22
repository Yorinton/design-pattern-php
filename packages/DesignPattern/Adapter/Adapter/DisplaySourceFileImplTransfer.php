<?php

namespace esignPattern\Adapter\Adapter;

use DesignPattern\Adapter\DisplaySourceFile;
use DesignPattern\Adapter\ShowFile;

class DisplaySourceFileImplTransfer implements DisplaySourceFile
{

    private $show_file;

    public function __construct($filename)
    {
        $this->show_file = new ShowFile($filename);
    }

    /**
     * 指定されたソースファイルをハイライト表示する
     */
    public function display()
    {
        //親クラスのメソッドやプロパティにアクセスする場合はparent::method()のように書く
        $this->show_file->showHighlight();
    }
}