<?php
class loginController extends baseController
{
    /**
     * @post
     */
    public function loginPost($data)
    {
        $username = $data["username"];
        $password = $data["password"];
        
        if ($this->LoginUser($username, $password))
        {
            $this->viewResult->viewName = "success";
        }
        else
        {
            $this->viewResult->viewName = "failure";
        }
        
        return $this->viewResult;
    }
    
    public function topbar($data)
    {
        if ($this->IsLoggedIn())
        {
            $this->viewResult->viewModel->link = "/login/logout";
            $this->viewResult->viewModel->loggedInName = $this->LoggedInName(); 
        }
        else
        {
            $this->viewResult->viewModel->link = "/login/login";
            $this->viewResult->viewModel->loggedInName = "Login"; 
        }
        
        $this->viewResult->viewName = "topbar";
        
        return $this->viewResult;
    }
    
    public function logout($data)
    {
        $this->LogoutUser();
        
        $this->viewResult->viewName = "loggedout";
        
        return $this->viewResult;
    }
}