<?php

namespace DesignPattern\TemplateMethod;

class ListDisplay extends AbstractDisplay
{


    /** サブクラスで実装する抽象メソッド */
    protected function displayHeader()
    {
        echo '<dl>';
    }

    protected function displayBody()
    {
        foreach($this->getData() as $key => $value){
            echo '<dt>Item ' . $key . '</dt>';
            echo '<dd>' . $value . '</dd>';
        }
    }

    protected function displayFooter()
    {
        echo '</dl>';
    }
}