<?php

namespace DesignPattern\Repository\Pattern3;

use Carbon\Carbon;
use DesignPattern\Repository\Title;
use DesignPattern\Repository\TodoItemId;
use DesignPattern\Repository\TodoItemInterface;

class TodoItem implements TodoItemInterface
{

    private $id;

    private $title;

    private $completedAt;

    //Value ObjectからEntityを生成する
    public function __construct(TodoItemId $id,Title $title,CompletedAt $completedAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->completedAt = $completedAt;
    }

    public function getId(): TodoItemId
    {
        return $this->id;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function isCompleted(?Carbon $datetime = null): bool
    {
        // TODO: Implement isCompleted() method.
    }

    public function markAsCompleted(?Carbon $datetime = null)
    {
        // TODO: Implement markAsCompleted() method.
    }
}