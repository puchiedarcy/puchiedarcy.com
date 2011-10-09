<?php
class BlogPost
{
    private $id;
    private $title;
    private $author;
    private $body;
    private $tags;
    private $date;
    
    function __construct($id, $title, $author, $body, $tags, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
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