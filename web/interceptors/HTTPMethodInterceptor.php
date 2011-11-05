<?php
class HTTPMethodInterceptor extends BaseInterceptor
{
    private $HTTPmethod;
    
    public function __construct($controller, $HTTPmethod)
    {
        parent::__construct($controller);
        $this->HTTPmethod = $HTTPmethod;
    }
    
    public function __call($method, $params)
    {
        $decoratedController = $this->GetDecoratedController($this->controller);
        $reflectedClass = new ReflectionClass($decoratedController);
        if ($reflectedClass->HasMethod($method))
        {
            $reflectedMethod = $reflectedClass->GetMethod($method);
            $comment = $reflectedMethod->GetDocComment();
            
            if ($comment && strpos($comment, " @post") && $this->HTTPmethod != "POST")
            {
                die("Unauthorized");
            }
        }
        
        $returnValue = $this->controller->$method($params[0]);
        
        return $returnValue;
    }
}