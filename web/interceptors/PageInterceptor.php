<?php
class PageInterceptor extends BaseInterceptor
{
    private $page;
    
    public function __construct($controller, $page)
    {
        parent::__construct($controller);
        $this->page = $page;
    }
    
    protected function Intercept($method, &$params)
    {
        if (count($params) < 1)
        {
            $params = array();
        }
        
        $params[0]["page"] = $this->page;
    }
}