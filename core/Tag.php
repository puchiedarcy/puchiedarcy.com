<?php
class Tag
{
    private $id;
    private $name;
    
    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = trim($name);
    }
    
    public function Id()
    {
        return $this->id;
    }
    
    public function Name()
    {
        return $this->name;
    }
}