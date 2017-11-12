<?php

namespace DesignPattern\TemplateMethod\Client;

use DesignPattern\TemplateMethod\ListDisplay;
use DesignPattern\TemplateMethod\TableDisplay;

class Client
{
    public function display()
    {
        $data = array(
            'Design Pattern',
            'Gang of Four',
            'Template Method Sample1',
            'Template Method Sample2'
        );

        $list = new ListDisplay($data);
        $table = new TableDisplay($data);

        $list->display();
        echo '<hr>';
        $table->display();
    }
}