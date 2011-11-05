<?php
class LoggedInInterceptor extends BaseInterceptor
{    
    public function __call($method, $params)
    {
        $decoratedController = $this->GetDecoratedController($this->controller);
        $reflectedClass = new ReflectionClass($decoratedController);
        
        if ($reflectedClass->HasMethod($method))
        {
            $reflectedMethod = $reflectedClass->GetMethod($method);
            $comment = $reflectedMethod->GetDocComment();
            if ($comment && strpos($comment, " @loggedIn") && !$decoratedController->IsLoggedIn())
            {
                die("Unauthorized");
            }
        }
        
        $returnValue = $this->controller->$method($params[0]);
        
        return $returnValue;
    }
}