<?php

namespace DesignPattern\Repository;

use Carbon\Carbon;


/**
 *
 * Todo項目エンティティのインターフェース
 *
 */

interface TodoItemInterface
{
	//TodoのIDを取得
	public function getId(): TodoItemId;//戻り値の型はTodoItemId型

	//Todoのタイトルを取得
	public function getTitle(): Title;

	//引数で指定した指定時間までに完了しているかどうか
	public function isCompleted(?Carbon $datetime = null): bool;

	//引数に指定した時間で完了済みとする
	public function markAsCompleted(?Carbon $datetime = null);
}