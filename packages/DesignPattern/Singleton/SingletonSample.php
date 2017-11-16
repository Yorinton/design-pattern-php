<?php

namespace DesignPattern\Singleton;

class SingletonSample
{
    /**
     * メンバー変数
     */
    private $id;

    /**
     * 唯一のインスタンスを保持する変数
     */
    private static $instance;

    /**
     * SingletonSample constructor.
     * IDに生成日時のハッシュ値を作成
     */
    private function __construct()
    {
        //１度のインスタンスの際に、idを設定
        $this->id = md5(date('r').mt_rand());
    }

    /**
     * 唯一のインスタンスを返すためのメソッド
     * @return SingletonSample
     * このメソッドを呼び出す時点ではインスタンス化されていないのでstaticを使う
     */
    public static function getInstance()
    {
        //まだインスタンスが作成されていない場合はnewする
        if(!isset(self::$instance)){
            //自身の$instanceプロパティに自身のインスタンスを格納
            self::$instance = new SingletonSample();
            echo "a SingletonSample Instance was created";
        }

        return self::$instance;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * __cloneマジックメソッドをオーバーライドして複製できないようにする
     * finalをつけることで、このメソッド自体がさらにオーバーライドされるのを防ぐ
     */
    public final function __clone()
    {
        throw new \RuntimeException('Clone is not allowed against '.get_class($this));
    }
}