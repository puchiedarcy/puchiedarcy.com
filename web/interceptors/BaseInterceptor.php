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
    
    public function __call($method, $params)
    {
        $decoratedController = $this->GetDecoratedController($this->controller);
        $reflectedClass = new ReflectionClass($decoratedController);
        
        if ($reflectedClass->HasMethod($method))
        {
            $reflectedMethod = $reflectedClass->GetMethod($method);
            $this->Intercept($reflectedMethod);
        }
        
        $data = NULL;
        if (count($params) > 0)
        {
            $data = $params[0];
        }
        
        $returnValue = $this->controller->$method($data);
        
        return $returnValue;
    }
    
    abstract protected function Intercept($method);
}