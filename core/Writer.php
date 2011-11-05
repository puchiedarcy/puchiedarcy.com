<?php
class Writer
{
    private $id;
    private $name;
    private $password;
    
    function __construct($id, $name, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }
    
    public function Id()
    {
        return $this->id;
    }
    
    public function Name()
    {
        return $this->name;
    }
    
    public function Password()
    {
        return $this->password;
    }
}