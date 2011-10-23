<?php
class BlogPost
{
    private $id;
    private $title;
    private $body;
    private $tags;
    private $date;
    
    function __construct($id, $title, $body, $tags, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->tags = $tags;
        $this->date = $date;
    }
    
    public function Id()
    {
        return $this->id;
    }
    
    public function Title()
    {
        return $this->title;
    }
    
    public function Body()
    {
        return $this->body;
    }
    
    public function Tags()
    {
        return $this->tags;
    }
    
    public function Date()
    {
        return $this->date;
    }
}