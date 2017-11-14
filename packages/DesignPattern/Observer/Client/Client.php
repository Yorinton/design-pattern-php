<?php

namespace DesignPattern\Observer\Client;

use DesignPattern\Observer\Cart;
use DesignPattern\Observer\Listener\PresentListener;
use DesignPattern\Observer\Listener\LoggingListener;

class Client //CartService等の名前でも良いと思う
{
    //この処理はCartFactory等に分けても良さそう
    public function createCart()
    {
        $cart = new Cart();
        //必要なListenerが増えたらここで追加・変更
        $cart->addListener(new PresentListener());
        $cart->addListener(new LoggingListener());

        return $cart;
    }

    public function operationCart($item,$mode)
    {
        //カート準備
        //sessionに$cartが存在しない場合は新しくCartを生成
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart']:null;
        if(is_null($cart)){
            $cart = $this->createCart();
        }

        //フロントでの処理内容に応じてメソッドを実行
        //(この処理はメソッドを分けていいと思う)
        switch($mode){
            case 'add':
                $cart->addItem($item);
                break;
            case 'remove':
                $cart->removeItem($item);
                break;
            case 'clear':
                //クリアの場合は新しくカートを生成して$cartに代入
                $cart = $this->createCart();
                break;
        }

        //処理が終わったら$cartをsessionに保存
        //これで現在のカートの状態が失われなくなる(※会員登録のあるサービスではDB等に永続化しても良いと思う)
        $_SESSION['cart'] = $cart;

        //カートを返して商品一覧の表示などはController等で行う
        return $cart;
    }
}