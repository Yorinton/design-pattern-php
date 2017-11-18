<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testForeachReference()
    {
        $arr = array(1,2,3,4);
        //$arrの各要素への参照に各要素の2倍を入れる形になる
        //元の$arrの値が変わる
        foreach($arr as &$value){
            $value = $value * 2;
        }
        unset($value);
        var_dump($arr);

        $this->assertTrue(true);
    }

    public function testForeachNoReference()
    {
        $arr2 = array(3,4,5,6);
        //参照ではないため、元の$arr3の値は変わらない
        foreach($arr2 as $value){
            echo "\n".$value * 2 ."\n";
        }
        var_dump($arr2);
        $this->assertTrue(true);
    }

    public function testArrayMap()
    {
        $arr3 = array(2,4,6,8);

        $arr3 = array_map(function($value){
            //ここでreturnした値が配列の各要素に格納される
            return $value * 3;
        },$arr3);

        var_dump($arr3);
        $this->assertTrue(true);
    }
}
