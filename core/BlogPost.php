<?php
class BlogPost
{
    private $title;
    private $author;
    private $body;
    private $tags;
    private $date;
    
    function __construct($title, $body, $tags, $date)
    {
        $this->title = $title;
        $this->author = "Puchie Darcy";
        $this->body = $body;
        $this->tags = $tags;
        $this->date = $date;
    }
    
    public function Title()
    {
        return $this->title;
    }
    
    public function Author()
    {
        return $this->author;
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