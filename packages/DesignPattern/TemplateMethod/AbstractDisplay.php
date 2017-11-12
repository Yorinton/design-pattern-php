<?php

namespace DesignPattern\TemplateMethod;

abstract class AbstractDisplay
{
    /**
     * 表示データ
     */
    private $data;

    /** @param mixed 表示データ */
    public function __construct($data)
    {
        if(!is_array($data)){
            $data = (array)$data;
        }
        $this->data = $data;
    }

    /** TemplateMethodに当たるメソッド */
    public function display()
    {
        $this->displayHeader();
        $this->displayBody();
        $this->displayFooter();
    }

    /** サブクラスで実装する抽象メソッド */
    protected abstract function displayHeader();
    protected abstract function displayBody();
    protected abstract function displayFooter();

    /** データ取得 */
    public function getData()
    {
        return $this->data;
    }
}