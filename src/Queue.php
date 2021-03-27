<?php

namespace queue;

class Queue
{
    public static function __callStatic($name, $arguments)
    {
        var_dump($name, $arguments);
    }
}