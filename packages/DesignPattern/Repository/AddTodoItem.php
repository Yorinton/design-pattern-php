<?php

namespace Designpattern\Repository;


//Serviceクラス(Repositoryを使う側)
class AddTodoItem
{
	private $repo;

	//Interfaceのみに依存する
	public function __construct(TodoItemRepositoryInterface $repo)
	{
		$this->repo = $repo;
	}

	public function __invoke(array $recorde): TodoItemInterface
	{
		//todoItemエンティティを初期化(インスタンス化の処理はrepository内のみで行う)
		$todoItem = $this->repo->new($recorde);
		//初期化したtodoItemエンティティを永続化(具体的な処理はreository内にカプセル化する)
		return $this->repo->persist($todoItem);
	}
}