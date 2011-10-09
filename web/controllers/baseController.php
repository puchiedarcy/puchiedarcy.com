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
}