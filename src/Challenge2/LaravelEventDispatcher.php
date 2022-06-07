<?php

namespace Interview\Challenge2;

/*
 * Implement interface methods and proxy them to Laravel event dispatcher
 */
class LaravelEventDispatcher implements EventDispatcherInterface
{
    private $listener = [];
    public function dispatch(object $event)
    {
        call_user_func($this->listener[$event::class], new $event());
    }

    public function addListener(string $event, \Closure $listener)
    {
        $this->listener[$event] = $listener;
    }
}