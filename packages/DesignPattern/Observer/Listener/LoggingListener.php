<?php

namespace DesignPattern\Observer\Listener;

use DesignPattern\Observer\Cart;

class LoggingListener implements CartListener
{

    public function __construct()
    {
    }

    //ショッピングカートが変化するたびにカート内の商品名と個数を表示する
    public function update(Cart $cart)
    {
        echo '<pre>';
        var_dump($cart->getItems());
        echo '<pre>';
    }
}