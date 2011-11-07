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
    
    public function AttachPageData($page, $count, $pageSize, $pageLink)
    {
        $this->viewResult->viewModel->pageData->count = $count;
        $this->viewResult->viewModel->pageData->page = $page;
        $this->viewResult->viewModel->pageData->prevPage = max($page - 1, 1);
        $this->viewResult->viewModel->pageData->lastPage = ceil($count / $pageSize);
        $this->viewResult->viewModel->pageData->nextPage = min($page + 1, $this->viewResult->viewModel->pageData->lastPage);
        $this->viewResult->viewModel->pageData->pageLink = $pageLink;
    }
}