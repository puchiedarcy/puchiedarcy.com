<?php
class AuthorizationInterceptor
{
    private $controller;
    
    public function __construct($controller)
    {
        $this->controller = $controller;
    }
    
    public function __call($method, $params)
    {
        $reflectedClass = new ReflectionClass($this->controller);
        if ($reflectedClass->HasMethod($method))
        {
            $reflectedMethod = $reflectedClass->GetMethod($method);
            $comment = $reflectedMethod->GetDocComment();
            if ($comment && strpos($comment, " @admin" ) && !$this->controller->IsLoggedInPlayerAdmin())
            {
                die("Unauthorized");
            }
        }
        
        $returnValue = $this->controller->$method($params[0]);
        
        return $returnValue;
    }
}