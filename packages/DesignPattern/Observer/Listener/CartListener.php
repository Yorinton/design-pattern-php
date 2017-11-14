<?php

namespace DesignPattern\Observer\Listener;

use DesignPattern\Observer\Cart;

interface CartListener
{
    //各Listenerに共通する処理はinterfaceに記述する
    public function update(Cart $cart);
}