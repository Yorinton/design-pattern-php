<?php

namespace DesignPattern\Repository\Pattern3;

class TodoItemFactory
{
    //EloquentModel($record)からTodoItemエンティティを生成する
    public function createTodoItemFromRecord(TodoItemRecord $record):TodoItem
    {
        return new TodoItem(
            TodoItemId::of($record->id),
            Title::of($record->id),
            CompletedAt::of($record->completed_at)
        );
    }
}