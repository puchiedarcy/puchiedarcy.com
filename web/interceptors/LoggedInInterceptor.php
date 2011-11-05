<?php
class LoggedInInterceptor extends BaseInterceptor
{
    private $isLoggedIn;
    
    public function __construct($controller, $isLoggedIn)
    {
        parent::__construct($controller);
        $this->isLoggedIn = $isLoggedIn;
    }
    
    protected function Intercept($method)
    {
        $comment = $method->GetDocComment();
        if ($comment && strpos($comment, " @loggedIn") && !$this->isLoggedIn)
        {
            die("Unauthorized");
        }
    }
}