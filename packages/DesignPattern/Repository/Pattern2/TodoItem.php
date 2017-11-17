<?php

namespace DesignPattern\Repository\Pattern2;

use Carbon\Carbon;
use DesignPattern\Repository\Title;
use DesignPattern\Repository\TodoItemId;
use DesignPattern\Repository\TodoItemInterface;


/**
 * Class TodoItem
 * @package DesignPattern\Repository\Pattern2
 * Eloquent Modelを中に持つ(に依存する)Entity
 */
class TodoItem implements TodoItemInterface
{

    private $record;

    //TodoItemRecord = Eloquento Model
    public function __construct(TodoItemRecord $record)
    {
        $this->record = $record;
    }

    public function getId(): TodoItemId
    {
        //$this->record->id = Eloquento Modelのid = DBに保存されたid
        return TodoItemId::of($this->record->id);
    }

    public function getTitle(): Title
    {
        return Title::of($this->record->title);
    }

    //引数で指定した指定時間までに完了しているかどうか
    public function isCompleted(?Carbon $datetime = null): bool
    {
        if(is_null($datetime)){
            $datetime = Carbon::now();
        }
        return CompletedAt::of($this->record->completed_at)->isPast($datetime);
    }

    //引数に指定した時間で完了済みとする
    public function markAsCompleted(?Carbon $datetime = null)
    {
        // TODO: Implement markAsCompleted() method.
    }
}