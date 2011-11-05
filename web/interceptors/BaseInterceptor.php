<?php
abstract class BaseInterceptor
{
    protected $controller;
    
    function __construct($controller)
    {
        $this->controller = $controller;
    }
    
    protected function Controller()
    {
        return $this->controller;
    }
    
    protected function GetDecoratedController($controller)
    {
        if (is_subclass_of($controller, "BaseInterceptor"))
        {
            return $controller->GetDecoratedController($controller->Controller());
        }
        else
        {
            return $controller;
        }
    }
}