<?php

namespace DesignPattern\Repository;


//value object
final class TodoItemId
{
	private $value;

	//引数の数値をプロパティに設定(自身でしか自分をインスタンス化出来ない)
	private function __construct(?int $value)
	{
		$this->value = $value;
	}

	//TodoIDの値を取得(スカラー)
	public function getValue(): ?int
	{
		return $this->value;
	}

	public static function of(?int $value): self//自身をインスタンス化して返す
	{
		return new self($value);
	}
}