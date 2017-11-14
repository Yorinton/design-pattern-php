<?php

namespace DesignPattern\Observer\Listener;

use DesignPattern\Observer\Cart;

/*
 * 特定の商品がカートに追加された場合に処理を行うクラス
 */
class PresentListener implements CartListener
{

    private static $PRESENT_TARGET_ITEM = '30:クッキーセット';
    private static $PRESENT_ITEM = '99:プレゼント';

    public function __construct()
    {

    }

    public function update(Cart $cart)
    {
        //プレゼント対象商品がカート内にある && プレゼントがカートに入って無い場合、カートにプレゼントを入れる
        if($cart->hasItem(self::$PRESENT_TARGET_ITEM) && $cart->hasItem(self::$PRESENT_ITEM)){
            $cart->addItem(self::$PRESENT_ITEM);
        }
        //プレゼント対象商品がカートに無い && プレゼントがカートに入っている場合、カートからプレゼントを無くす
        if(!$cart->hasItem(self::$PRESENT_TARGET_ITEM) && $cart->hasItem(self::$PRESENT_ITEM)){
            $cart->removeItem(self::$PRESENT_ITEM);
        }
    }
}
