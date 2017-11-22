<?php

namespace DesignPattern\Adapter;

use esignPattern\Adapter\Adapter\DisplaySourceFileEx;
use esignPattern\Adapter\Adapter\DisplaySourceFileImplTransfer;

class Client
{
    public function showFile($filename)
    {
        //ShowFileをインスタンス化
        try{
            $show_file = new ShowFile($filename);
        }catch(\Exception $e){
            die($e->getMessage());
        }

        $show_file->showPlain();
        echo '<hr>';
        $show_file->showHighlight();
    }

    public function showFileImplEx($filename)
    {
        $show_file = new DisplaySourceFileEx($filename);

        $show_file->display();
    }

    public function showFileImplTransfer($filename)
    {
        $show_file = new DisplaySourceFileImplTransfer($filename);

        $show_file->display();
    }
}