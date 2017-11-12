<?php

namespace DesignPattern\TemplateMethod;

class TableDisplay extends AbstractDisplay
{


    /** サブクラスで実装する抽象メソッド */
    protected function displayHeader()
    {
        echo '<table border="1" cellpadding="2" cellspacing="2">';
    }

    protected function displayBody()
    {
        foreach ($this->getData() as $key => $value) {
            echo '<tr>';
            echo '<th>' . $key . '</th>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
    }

    protected function displayFooter()
    {
        echo '</table>';
    }
}