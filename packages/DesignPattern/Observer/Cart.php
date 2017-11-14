<?php

namespace DesignPattern\Observer;

use DesignPattern\Observer\Listener\CartListener;
/**
 * 観察対象のクラス / 観測されるべき状態を保持する
 */
class Cart
{
    private $items;
    private $listeners;

    public function __construct()
    {
        //instance化の際にプロパティに配列を設定
        $this->items = array();
        $this->listeners = array();
    }

    public function addItem($item_cd)
    {
        //itemを追加 キー => item名、値 => 個数 の配列
        $this->items[$item_cd] = (isset($this->items[$item_cd]) ? ++$this->items[$item_cd] : 1);
        //追加されたことをObserverに通知
        $this->notify();
    }

    public function removeItem($item_cd)
    {
        //該当のitemが存在している場合個数を一つ減らす、個数が0になったらアイテム自体削除する
        $this->items[$item_cd] = (isset($this->items[$item_cd]) ? --$this->items[$item_cd] : 0);
        if ($this->items[$item_cd] <= 0) {
            unset($this->items[$item_cd]);
        }
        //削除されたことをObserverに通知
        $this->notify();
    }

    public function getItems()
    {
        //キー => item名、値 => 個数の連想配列を返す
        return $this->items;
        //状態は変わらないので通知も無し
    }

    public function hasItem($item_cd)
    {
        //$this->itemsのキーに指定した名前($item_cd)のitemが存在するかチェック
        return array_key_exists($item_cd,$this->items);
        //状態は変わらないので通知も無し
    }

    /*
     * Observer登録
     */
    public function addListener(CartListener $listener)
    {
        //$this->listeners['CartListener'] = $listener
        $this->listeners[get_class($listener)] = $listener;
    }

    /*
     * Observer削除
     */
    public function removeListener(CartListener $listener)
    {
        unset($this->listeners[get_class($listener)]);
    }

    /*
     * Observerへの通知
     */
    public function notify()
    {
        //各リスナーに状態変化を通知するために自分自身を渡している
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }
}