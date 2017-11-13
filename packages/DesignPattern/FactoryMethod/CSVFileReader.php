<?php

namespace DesignPattern\FactoryMethod;


use Exception;

class CSVFileReader implements Reader
{

    /**
     * 内容を表示するファイル名
     *
     * @access private
     */
    private $filename;

    /**
     * データを扱うハンドラ名
     *
     * @access private
     */
    private $handler;

    /**
     * CSVFileReader constructor.
     * @param $filename
     * @throws Exception
     */
    public function __construct($filename)
    {
        //ファイルが存在し、読み込み可能か
        if(!is_readable($filename)){
            throw new Exception('file"'.$filename.'"is not readable');
        }
        $this->filename = $filename;
    }


    public function read()
    {
        // 読み込みのみでオープン.ファイルポインタをファイルの先頭に
        $this->handler = fopen($this->filename,"r");
    }

    public function display()
    {
        $column = 0;
        $tmp = "";
        while($data = fgetcsv($this->handler,1000,",")){
            $num = count($data);
            for($c = 0;$c < $num;$c++){
                //最初の列(カラム)に対する処理
                //前のレコードと作者名が同じ（$data[$c] == $tmpの場合）ならここはスルーされる
                if($c == 0){
                    //2列目以降でかつカラム内の文字列が$tmpと異なる場合はulタグを閉じる
                    if($column != 0 && $data[$c] != $tmp){
                        echo "</ul>";
                    }
                    //カラム内の文字列が$tmpと異なる場合は、太字で表示してulの開始タグを表示・・作者名
                    //そのあと$tmpにカラム内の文字列を入れる
                    if($data[$c] != $tmp){
                        echo "<b>".$data[$c]."</b>";
                        echo "<ul>";
                        $tmp = $data[$c];
                    }
                //2列(カラム)目以降はliタグで表示する・・曲名
                }else{
                    echo "<li>";
                    echo $data[$c];
                    echo "<li>";
                }
            }
            $column++;
        }
        echo "</ul>";
        fclose($this->handler);
    }
}