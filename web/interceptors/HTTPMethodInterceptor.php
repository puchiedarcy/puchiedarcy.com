<?php
class HTTPMethodInterceptor
{
    private $controller;
    private $HTTPmethod;
    
    public function __construct($controller, $HTTPmethod)
    {
        $this->controller = $controller;
        $this->HTTPmethod = $HTTPmethod;
    }
    
    public function __call($method, $params)
    {
        $reflectedClass = new ReflectionClass($this->controller);
        if ($reflectedClass->HasMethod($method))
        {
            $reflectedMethod = $reflectedClass->GetMethod($method);
            $comment = $reflectedMethod->GetDocComment();
            if ($comment && strpos($comment, " @post" ) && $this->HTTPmethod != "POST")
            {
                die("Unauthorized");
            }
        }
        
        $returnValue = $this->controller->$method($params[0]);
        
        return $returnValue;
    }
}