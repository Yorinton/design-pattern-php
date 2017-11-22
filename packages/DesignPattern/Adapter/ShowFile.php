<?php

namespace DesignPattern\Adapter;

class ShowFile
{
    /**
     * 内容を表示するファイル名
     *
     * @access private
     */
    private $filename;

    /**
     * コンストラクタ
     *
     * @param string ファイル名
     * @throws \InvalidArgumentException
     */
    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new \InvalidArgumentException('file "' . $filename . '" is not readable !');
        }
        $this->filename = $filename;
    }

    /**
     * プレーンテキストとして表示します
     */
    public function showPlain()
    {
        echo '<pre>';
        echo htmlspecialchars(file_get_contents($this->filename), ENT_QUOTES, mb_internal_encoding());
        echo '</pre>';
    }

    /**
     * キーワードをハイライトして表示します
     */
    public function showHighlight()
    {
        highlight_file($this->filename);
    }
}