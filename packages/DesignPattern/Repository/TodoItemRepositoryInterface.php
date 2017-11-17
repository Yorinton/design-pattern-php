<?php

namespace DesignPattern\Repository;

interface TodoItemRepositoryInterface
{
	//IDを指定してエンティティを取得
	public function find(TodoItemId $id): ?TodItemInterface;

	//全エンティティを取得
	public function list():Collection;

	//エンティティを永続化
	public function persist(TodoItemInterface $todoItem): TodoItemInterface;

	//エンティティを初期化
	public function new (array $record): TodoItemInterface;

}