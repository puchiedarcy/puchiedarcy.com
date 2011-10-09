<?php
class masterController extends baseController
{
    /**
    * @post
    */
    public function two()
    {
        echo "TWO";
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
}