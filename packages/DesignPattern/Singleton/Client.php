<?php

namespace DesignPattern\Singleton;

class Client
{
    public function compareInstance()
    {
        $instance_1 = SingletonSample::getInstance();
        $instance_2 = SingletonSample::getInstance();

        return $instance_1 === $instance_2;
    }

    public function compareId()
    {
        $instance_1 = SingletonSample::getInstance();
        $instance_2 = SingletonSample::getInstance();

        return $instance_1->getId() === $instance_2->getId();
    }

    public function cloneSingleton()
    {
        $instance_1 = SingletonSample::getInstance();
        $instance_1_clone = clone $instance_1;
    }
}