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
        $arr2 = array(1,2,3,4);
        //参照ではないため、元の$arr3の値は変わらない
        foreach($arr2 as $value){
            $arr_mapped[] = $value * 2;
        }
        dd($arr_mapped);
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

    //配列を文字列型にキャストできるかのテスト -> エラーになる
    public function testCastFromArrayToString()
    {
        $arr = ['a' => 'Tokyo','b' => 'Nagoya','c' => 'Hakata'];
        $str = (string)$arr;

        echo $str;
        $this->assertTrue(true);
    }
}
