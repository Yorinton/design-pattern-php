<?php

namespace DesignPattern\FactoryMethod;

//読み込み機能・表示機能を表現するインターフェース
interface Reader
{
    function read();
    function display();
}