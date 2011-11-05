<?php
abstract class baseController
{
    protected $viewResult;
    
    public function __construct()
    {
        $this->viewResult->viewName = null;
        $this->viewResult->viewModel = null;
    }
    
    public function __call($method, $params)
    {
        $this->viewResult->viewName = $method;
        
        return $this->viewResult;
    }
    
    public function IsLoggedIn()
    {
        return array_key_exists("name", $_SESSION) && !is_null($_SESSION["name"]);
    }
    
    public function LoggedInName()
    {
        return $_SESSION["name"];
    }
    
    public function LoginUser($name, $password)
    {
        $writerRepo = new WriterRepository();
        
        if ($writer = $writerRepo->CheckPassword($name, $password))
        {
            $_SESSION["name"] = $name;
            return true;
        }
        return false;
    }
    
    public function LogoutUser()
    {
        session_destroy();
    }
}