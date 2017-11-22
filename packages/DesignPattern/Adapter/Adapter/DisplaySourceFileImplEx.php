<?php

namespace esignPattern\Adapter\Adapter;

use DesignPattern\Adapter\DisplaySourceFile;
use DesignPattern\Adapter\ShowFile;

class DisplaySourceFileEx extends ShowFile implements DisplaySourceFile
{

    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    /**
     * 指定されたソースファイルをハイライト表示する
     */
    public function display()
    {
        //親クラスのメソッドやプロパティにアクセスする場合はparent::method()のように書く
        parent::showHighlight();
    }
}