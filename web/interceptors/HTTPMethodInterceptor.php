<?php
class HTTPMethodInterceptor extends BaseInterceptor
{
    private $HTTPmethod;
    
    public function __construct($controller, $HTTPmethod)
    {
        parent::__construct($controller);
        $this->HTTPmethod = $HTTPmethod;
    }
    
    public function Intercept($method)
    {
        $comment = $method->GetDocComment();
        
        if ($comment && strpos($comment, " @post") && $this->HTTPmethod != "POST")
        {
            die("Unauthorized");
        }
    }
}