<?php

namespace DesignPattern\Repository\Pattern1;

use Carbon\Carbon;
use DesignPattern\Repository\Title;
use DesignPattern\Repository\TodoItemId;
use DesignPattern\Repository\TodoItemInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Class TodoItem
 * @package DesignPattern\Repository\Pattern1
 * Eloquent ModelによるTodoItemエンティティ実装
 * Entity = Eloquent Model
 */
class TodoItem extends Model implements TodoItemInterface
{

    protected $dates = ['completed_at'];

    public function getId(): TodoItemId
    {
        //$this->idはEloquentModelのid = DBに保存されているid
        return TodoItemId::of($this->id);
    }

    public function getTitle(): Title
    {
        return Title::of($this->title);
    }

    //引数で指定した指定時間までに完了しているかどうか
    public function isCompleted(?Carbon $datetime = null): bool
    {
        if(is_null($datetime)){
            $datetime = Carbon::now();
        }
        return CompletedAt::of($this->completed_at)->isPast($datetime);
    }

    //引数に指定した時間で完了済みとする
    public function markAsCompleted(?Carbon $datetime = null)
    {
        if(is_null($datetime)){
            $datetime = carbon::now();
        }
        CompletedAt::mark($this->completed_at);
    }
}