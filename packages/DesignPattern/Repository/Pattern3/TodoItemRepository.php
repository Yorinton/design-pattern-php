<?php

namespace DesignPattern\Repository\Pattern3;

use DesignPattern\Repository\Collection;
use DesignPattern\Repository\TodItemInterface;
use DesignPattern\Repository\TodoItemId;
use DesignPattern\Repository\TodoItemInterface;
use DesignPattern\Repository\TodoItemRepositoryInterface;

class TodoItemRepository implements TodoItemRepositoryInterface
{

    private $factory;

    //Repository内でFactoryを使う
    public function __construct(TodoItemFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param TodoItemId $id
     * @return TodItemInterface|null
     */
    public function find(TodoItemId $id): ?TodItemInterface
    {
        //EloquentModelから指定したidのモデルを取得
        $record = TodoItemRecord::query()->find($id->getValue());

        if(is_null($record)){
            return null;
        }
        return $this->factory->createTodoItemFromRecord($record);
    }

    public function list(): Collection
    {
        // TODO: Implement list() method.
    }

    public function persist(TodoItemInterface $todoItem): TodoItemInterface
    {
        // TODO: Implement persist() method.
    }

    public function new(array $record): TodoItemInterface
    {
        // TODO: Implement new() method.
    }
}